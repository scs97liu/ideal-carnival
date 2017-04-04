<?php

namespace App\Http\Controllers;

use App\MedicalProfessional;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunicationController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $connections = Auth::user()->connections()->attached()->get();
        return view('main.communication.create')
            ->withConnections($connections)
            ->withTitle('Send Message to Medical Professional');
    }

    public function store(Request $request)
    {
        //
    }

    public function manage()
    {
        $connections = Auth::user()->connections()->attached()->get();
        return view('main.communication.manage')
            ->withConnections($connections)
            ->withTitle('Manage Medical Professionals');
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

}
