<?php

namespace App\Http\Controllers;

use App\Average;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $fourteenDays = $this->fourteenAverage($user);
        $lowTarget = $user->getSetting('low_target', 0);
        $highTarget = $user->getSetting('high_target', 0);
        $percentage = round((($fourteenDays - $lowTarget) * 100) / ($highTarget - $lowTarget), 0);
        list($highCount, $lowCount, $total) = $this->countBg($lowTarget, $highTarget, $user);
        $highPercentage = round(($highCount / $total) * 100, 0);
        $lowPercentage = round(($lowCount / $total) * 100, 0);
        $insulinTotal = $this->insulinTotal($user);
        $recent = $this->recent($user);

        $logs = Auth::user()->logs()
            ->week()
            ->attached()
            ->orderBy('time', 'asc')
            ->get();

        $byDate = $logs->groupBy(function($item, $key){
            return $item->time->format('Y-m-d');
        });

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


        return view('main.home.home')
            ->withTitle('Dashboard')
            ->withAverage($fourteenDays)
            ->withPercentage($percentage)
            ->withHighCount($highCount)
            ->withLowCount($lowCount)
            ->withHighPercentage($highPercentage)
            ->withLowPercentage($lowPercentage)
            ->withInsulinTotal($insulinTotal)
            ->withRecent($recent)
            ->withRanges(json_encode($ranges))
            ->withAverages(json_encode($averages));
    }

    private function fourteenAverage($user)
    {
        $fourteenDays = $user->logs()->range(
            Carbon::today()->addDays(-14),
            Carbon::tomorrow()
        )->attached()->get();
        $average = new Average();
        foreach($fourteenDays as $log)
        {
            $average->addValue($log->bg->bg);
        }

        return $average->getAverage();
    }

    private function countBg($lowTarget, $highTarget, $user)
    {
        $high = 0;
        $low = 0;
        $week = $user->logs()->week()->attached()->get();
        foreach($week as $log)
        {
            $bg = $log->bg->bg;
            if($bg < $lowTarget) $low++;
            if($bg > $lowTarget) $high++;
        }

        return [$high, $low, $week->count()];
    }

    private function insulinTotal($user)
    {
        $total = 0;
        $yesterday = Carbon::yesterday()->setTime(0,0);
        $logs = $user->logs()->range($yesterday, $yesterday->copy()->addDay())
            ->attached()
            ->has('medications')
            ->get();

        foreach($logs as $log)
        {
            foreach($log->medications()->get() as $insulin)
            {
                $total += $insulin->amount;
            }
        }

        return $total;
    }

    private function recent($user)
    {
        $rows = [];
        $logs = $user->logs()
            ->range(Carbon::now()->subMonth(1), Carbon::now())
            ->orderBy('time', 'desc')
            ->attached()
            ->limit(50)
            ->get();
        foreach($logs as $log)
        {
            $rows = array_merge($rows, $log->present()->forDashboard());
        }
        return $rows;
    }
}
