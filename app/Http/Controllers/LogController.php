<?php

namespace App\Http\Controllers;

use App\BloodSugar;
use App\Carb;
use App\Exercise;
use App\Log;
use App\Medication;
use App\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index()
    {

        $logs = Auth::user()->logs()->orderBy('time', 'desc')->get();

        return view('main.log.index')
            ->withLogs($logs)
            ->withTitle('Log History');
    }

    public function create()
    {
        return view('main.log.create')->withTitle('Add New Log Entry');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $mainLog = new Log();
        $mainLog->time =
            Carbon::createFromFormat('d F Y - H:i', $request->input('datetime'));
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

        $start = $log->time->copy()->setTime(0, 0);
        $end = $log->time->copy()->setTime(0, 0)->addDay();
        $logs = Log::range($start, $end)->attached()->get();
        $dataPoints = $logs->map(function($log){
            return $log->present()->chartDataPoint();
        });


        return view('main.log.show')
            ->withLog($log)
            ->withTitle('Log Entry From ' . $log->time)
            ->withData($dataPoints->toJson());
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    private function attachNote($obj, $noteName, $request)
    {
        if($request->has($noteName))
        {
            $note = new Note();
            $note->text = $request->input($noteName);
            $obj->notes()->save($note);
        }
    }
}
