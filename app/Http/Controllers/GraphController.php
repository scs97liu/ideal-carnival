<?php

namespace App\Http\Controllers;

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
            $logs = Log::today()->attached()->get();
        }

        $dataPoints = $logs->map(function($log){
            return $log->present()->chartDataPoint();
        });

        return view('main.graph.index')
            ->withData($dataPoints->toJson())
            ->withTitle('Blood Sugar History')
            ->withType('bloodsugars');
    }

    public function average()
    {
        $logs = Log::month()->attached()->get();
        $dataPoints = $logs->map(function($log){
            return $log->present()->chartDataPoint();
        });
        return view('main.graph.index')
            ->withData($dataPoints->toJson())
            ->withTitle('Blood Sugar Averages')
            ->withType('average');
    }

}
