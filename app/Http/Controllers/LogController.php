<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $rows = [
            ['Feb 7th 2017', '5.4', '40g', '20min', true],
            ['Feb 7th 2017', '12.1', 'N/A', 'N/A', true],
            ['Feb 7th 2017', '8.2', '60g', 'N/A', true],
            ['Feb 6th 2017', '7.1', '50g', 'N/A', true],
            ['Feb 6th 2017', '3.2', 'N/A', '45min', true],
            ['Feb 5th 2017', '8.2', '100g', 'N/A', true],
            ['Feb 5th 2017', '10.5', '20g', 'N/A', true],
            ['Feb 5th 2017', '9.5', '10g', 'N/A', true],
        ];

        return view('log.index')
            ->withRows($rows)
            ->withTitle('Log History');
    }

    public function create()
    {
        return view('log.create')->withTitle('Add New Log Entry');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
}
