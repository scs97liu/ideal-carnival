<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunication;
use App\MedicalProfessional;
use App\Message;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunicationController extends Controller
{
    public function index()
    {
        $communications = Auth::user()->messages()->with('sender')->get();
        return view('main.communication.index')
            ->withCommunications($communications)
            ->withTitle('All Communications');
    }

    public function show($id)
    {
        $communication = Message::where('id', $id)->with('sender')->get()->first();
        $communication->viewed = true;
        $communication->save();
        return view('main.communication.show')
            ->withCommunication($communication)
            ->withTitle('Message');
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        if($user->type === 'professional')
        {
            $connections = $user->professional->connections()->get();
        } else {
            $connections = $user->connections()->attached()->get();
        }

        if($request->has('id'))
        {
            $id = $request->get('id');
        } else {
            $id = 0;
        }


        return view('main.communication.create')
            ->withId($id)
            ->withConnections($connections)
            ->withTitle('Send Message to Medical Professional');
    }

    public function store(StoreCommunication $request)
    {
        $message = new Message();
        $message->from_user = Auth::user()->id;
        $message->to_user = $request->get('to');
        $message->text = $request->get('message');
        $message->request_appointment = $request->has('request');
        if($request->get('log-id')){
            $message->log_id = $request->get('log-id');
        }
        $message->save();

        return redirect()->back()->withSuccess('Successfully Sent Message!');
    }

    public function manage()
    {
        if(Auth::user()->type == 'professional')
        {
            $connections = Auth::user()->professional->connections()->get();
            return view('main.communication.manage_clients')
                ->withConnections($connections)
                ->withTitle('Manage Clients');
        } else {
            $connections = Auth::user()->connections()->attached()->get();
            return view('main.communication.manage')
                ->withConnections($connections)
                ->withTitle('Manage Medical Professionals');
        }

    }

    public function search(Request $request)
    {
        $term = $request->get('q');
        return User::has('professional')
            ->where('first_name', 'like', '%' . $term . '%')
            ->orWhere('last_name', 'like', '%' . $term . '%')
            ->with('professional')
            ->get()->toJson();
    }

    public function addProf(Request $request)
    {
        $existing = MedicalProfessional::whereHas('connections', function($query) use ($request){
           $query->where('users.id', Auth::user()->id);
        })->get();
        if(count($existing) <= 0)
        {
            $prof = MedicalProfessional::where('id', $request->get('id'))
                ->get()->first();
            Auth::user()->connections()->attach($prof);
            return redirect()->back()->withSuccess('Successfully added ' . $prof->user->present()->fullName . '!');
        } else {
            return redirect()->back()->withError('You can not add a medical professional twice');
        }
    }

    public function deleteProf(Request $request)
    {
        $prof = MedicalProfessional::where('id', $request->get('id'))->get()->first();
        Auth::user()->connections()->detach($prof);
        return redirect()->back()->withSuccess('Successfully removed ' . $prof->user->present()->fullName . '!');
    }

    public function searchLogs(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->get('date'), 'UTC')
            ->setTime(0, 0);
        $logs = Auth::user()->logs()
            ->range($start, $start->copy()->addDay())
            ->attached()
            ->orderBy('time', 'desc')
            ->get();
        return view('main.communication._log_selector_table')
            ->withLogs($logs);
    }

}
