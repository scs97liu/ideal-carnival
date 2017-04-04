<?php

namespace App\Http\Controllers;

use App\BloodSugar;
use App\Carb;
use App\Exercise;
use App\Http\Requests\StoreLogEntry;
use App\Log;
use App\Medication;
use App\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $start = '';
        $end = '';
        $logs = null;
        $title = '';

        if($request->has('start') && $request->has('end'))
        {
            $start = Carbon::createFromFormat('Y-m-d', $request->get('start'), 'UTC')
                ->setTime(0, 0);
            $end = Carbon::createFromFormat('Y-m-d', $request->get('end'), 'UTC')
                ->setTime(0, 0);
            $logs = Auth::user()->logs()
                ->range($start, $end->copy()->addDay())
                ->attached()
                ->orderBy('time', 'desc')
                ->get();

            $title = "<small>" . $start->format('M j, Y') . " - " . $end->format('M j, Y') . "</small>";
        } else {
            $logs = Auth::user()->logs()
                ->attached()
                ->orderBy('time', 'desc')
                ->limit(100)
                ->get();

            $title = "<small>Last 100</small>";
        }

        return view('main.log.index')
            ->withLogs($logs)
            ->withTitle('Log History ' . $title);
    }

    public function create()
    {
        return view('main.log.create')->withTitle('Add New Log Entry');
    }

    public function store(StoreLogEntry $request)
    {
        $mainLog = new Log();
        $mainLog->time =
            Carbon::createFromFormat('d F Y - H:i', $request->input('datetime'), 'UTC');
        $mainLog->user_id = Auth::user()->id;
        $mainLog->save();

        if($request->has('bg'))
        {
            $bg = new BloodSugar();
            $bg->bg = $request->input('bg');
            $mainLog->bg()->save($bg);
            $this->attachNote($bg, 'bg-note', $request);
        }

        if($request->has('carbs'))
        {
            $carb = new Carb();
            $carb->carbs = $request->input('carbs');
            $mainLog->carb()->save($carb);
            $this->attachNote($carb, 'carb-note', $request);
        }

        if($request->input('insulin')[0])
        {
            $insulinAmounts = $request->input('insulin');
            $insulinTypes = $request->input('insulin-types');

            for($i = 0; $i < count($insulinAmounts); $i++)
            {
                $insulin = new Medication();
                $insulin->amount = $insulinAmounts[$i];
                $insulin->type = $insulinTypes[$i];
                $mainLog->medications()->save($insulin);
                $this->attachNote($insulin, 'medication-note', $request);

            }
        }

        if($request->has('exercise'))
        {
            $exercise = new Exercise();
            $exercise->minutes =  $request->input('exercise');
            $exercise->difficulty = $request->input('exercise-intensity');
            $mainLog->exercise()->save($exercise);
            $this->attachNote($exercise, 'exercise-note', $request);
        }

        $this->attachNote($mainLog, 'additional-notes', $request);
        $historyLink = '<a href="' . route('log.index') . '">here</a>';
        return back()->with('success', 'Added new log! Go to your history ' . $historyLink);
    }

    public function show($id)
    {
        $log = Log::where('id', $id)->attached()->first();

        $start = $log->time->copy()->addHours(-24);
        $end = $log->time->copy()->addHours(24);
        $logs = $log->user->logs()->range($start, $end)
            ->attached()
            ->orderBy('time', 'asc')
            ->has('bg')
            ->get();
        $dataPoints = $logs->map(function($log){
            return $log->present()->chartDataPoint();
        });


        return view('main.log.show')
            ->withLog($log)
        ->withTitle('Log Entry - ' . $log->time->format('l F j Y - h:i A'))
            ->withData($dataPoints->toJson());
    }

    public function edit($id)
    {
        $log = Log::where('id', $id)->attached()->get()->first();
        return view('main.log.edit')
            ->withLog($log)
            ->withTitle('Edit Log Entry');
    }

    public function update(StoreLogEntry $request, $id)
    {
        $log = Log::where('id', $id)->attached()->get()->first();
        $bg = $this->getAttacheObject($log, 'bg', BloodSugar::class);
        $carb = $this->getAttacheObject($log, 'carb', Carb::class);
        $medication = $this->getAttacheObject($log, 'medications', Collection::class);
        $exercise = $this->getAttacheObject($log, 'exercise', Exercise::class);
        $notes = $this->getAttacheObject($log, 'notes', Collection::class);

        if($request->has('bg'))
        {
            $bg->bg = $request->input('bg');
            $bg->save();
            $this->attachNote($bg, 'bg-note', $request);
        } elseif($log->bg) {
            $bg->delete();
        }

        if($request->has('carbs'))
        {
            $carb->carbs = $request->input('carbs');
            $carb->save();
            $this->attachNote($carb, 'carb-note', $request);
        } elseif($log->carb) {
            $carb->delete();
        }

        if($request->input('insulin')[0])
        {
            $insulinAmounts = $request->input('insulin');
            $insulinTypes = $request->input('insulin-types');

            for($i = 0; $i < count($insulinAmounts); $i++)
            {
                if($medication[$i])
                {
                    $insulin = $medication[$i];
                    $insulin->amount = $insulinAmounts[$i];
                    $insulin->type = $insulinTypes[$i];
                    $insulin->save();
                    $this->attachNote($insulin, 'medication-note', $request);
                } else {
                    $insulin = new Medication();
                    $insulin->amount = $insulinAmounts[$i];
                    $insulin->type = $insulinTypes[$i];
                    $log->medications()->save($insulin);
                    $this->attachNote($insulin, 'medication-note', $request);
                }
            }

            while($i < count($medication))
            {
                $medication[$i]->delete();
                $i++;
            }
        } elseif($log->medications) {
            foreach($log->medications as $medication)
            {
                $medication->delete();
            }
        }

        if($request->has('exercise'))
        {
            $exercise->minutes =  $request->input('exercise');
            $exercise->difficulty = $request->input('exercise-intensity');
            $exercise->save();
            $this->attachNote($exercise, 'exercise-note', $request);
        } elseif($log->exercise) {
            $exercise->delete();
        }


        return redirect()->back()->withSuccess('Successfully updated log!');
    }

    public function destroy($id)
    {
        $log = Log::where('id', $id)->get()->first();
        $log->bg()->delete();
        $log->carb()->delete();
        $log->exercise()->delete();
        $log->medications()->delete();
        $log->notes()->delete();
        $log->delete();
        return redirect()->back()->withSuccess('Successfully deleted log');
    }

    private function attachNote($obj, $noteName, $request)
    {
        if($obj->notes->first())
        {
            if($request->has($noteName))
            {
                $note = $obj->notes->first();
                $note->text = $request->input($noteName);
                $note->save();
            } else {
                $note = $obj->notes->first();
                $note->delete();
            }
            return;
        }

        if($request->has($noteName))
        {
            $note = new Note();
            $note->text = $request->input($noteName);
            $obj->notes()->save($note);
        }
    }

    private function getAttacheObject($obj, $property, $class)
    {
        if($obj->{$property})
        {
            return $obj->{$property};
        } else {
            $newObj = new $class;
            $newObj->log_id = $obj->id;
            return $newObj;
        }
    }
}
