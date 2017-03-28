<?php

namespace App\Http\Controllers;

use App\Average;
use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function index()
    {
        return redirect(route('graph.bg'));
    }

    public function create()
    {
        return 'Create form';
    }

    public function bg(Request $request)
    {
        $start = '';
        $end = '';
        $logs = null;
        if($request->has('start') && $request->has('end'))
        {
            $start = Carbon::createFromFormat('Y-m-d', $request->get('start'))
                ->setTime(0, 0);
            $end = Carbon::createFromFormat('Y-m-d', $request->get('end'))
                ->setTime(0, 0);
            $logs = Log::range($start, $end->copy()->addDay())->attached()->get();
        } else {
            $start = Carbon::today();
            $end = Carbon::tomorrow();
            $logs = Log::today()->attached()->get();
        }

        $dataPoints = $logs->map(function($log){
            return $log->present()->chartDataPoint();
        });

        if(!$end->isSameDay($start))
        {
            $title = "Blood Sugar History <small>" . $start->format('M j, Y') . " - " . $end->format('M j, Y') . "</small>";
        } else {
            $title = "Blood Sugar History <small>" . $start->format('M j, Y') . "</small>";
        }

        return view('main.graph.index')
            ->withData($dataPoints->toJson())
            ->withTitle($title)
            ->withType('bloodsugars')
            ->withStart($start->copy()->timestamp * 1000)
            ->withEnd($end->copy()->timestamp * 1000)
            ->withLogs($logs);
    }

    public function average(Request $request)
    {

        $start = '';
        $end = '';
        $logs = null;
        if($request->has('start') && $request->has('end'))
        {
            $start = Carbon::createFromFormat('Y-m-d', $request->get('start'), 'UTC')
                ->setTime(0, 0);
            $end = Carbon::createFromFormat('Y-m-d', $request->get('end'), 'UTC')
                ->setTime(0, 0);
            $logs = Log::range($start, $end->copy()->addDay())->attached()->get();
        } else {
            $start = Carbon::today();
            $end = Carbon::today()->addMonth();
            $logs = Log::month()->attached()->get();
        }

        $byDate = $logs->groupBy(function($item, $key){
            return $item->time->format('Y-m-d');
        });

        $ranges = [];
        $averages = [];
        $table = [];

        foreach($byDate as $key => $value)
        {
            $average = new Average();
            foreach($value as $log)
            {
                $average->addValue($log->bg->bg);
            }
            $timestamp = Carbon::createFromFormat('Y-m-d', $key, 'UTC')
                    ->setTime(0,0)->timestamp * 1000;
            $ranges[] = [
                'x' => $timestamp,
                'low' => $average->getLow(),
                'high' => $average->getHigh()
            ];
            $averages[] = [
                'x' => $timestamp,
                'y' => $average->getAverage(),
                'url' => route('graph.bg', ['start' => $key, 'end' => $key])
            ];
            $table[] = [
                'date' => $key,
                'average' => $average->getAverage(),
                'low' => $average->getLow(),
                'high' => $average->getHigh(),
                'url' => route('graph.bg', ['start' => $key, 'end' => $key])
            ];
    }

        if(!$end->isSameDay($start))
        {
            $title = "Blood Sugar Averages <small>" . $start->format('M j, Y') . " - " . $end->format('M j, Y') . "</small>";
        } else {
            $title = "Blood Sugar Averages <small>" . $start->format('M j, Y') . "</small>";
        }

        return view('main.graph.index')
            ->withRanges(json_encode($ranges))
            ->withAverages(json_encode($averages))
            ->withTitle($title)
            ->withType('averages')
            ->withStart($start->copy()->timestamp * 1000)
            ->withEnd($end->copy()->timestamp * 1000)
            ->withTable($table);
    }

}
