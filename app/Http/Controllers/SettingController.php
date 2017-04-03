<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreferences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.setting.index')->withTitle('Settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePreferences|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreferences $request)
    {
        $preferences = Auth::user()->preferences()->get()->first();
        $preferences->high_target = $request->get('high-target');
        $preferences->low_target = $request->get('low-target');
        $preferences->preferred_units = $request->get('preferred-units');
        $preferences->notes = $request->get('notes');
        $preferences->save();

        return redirect()->back()->withSuccess('Successfully updated preferences!');
    }

}
