<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ToolController extends Controller
{
    public function index()
    {
        return view('main.tool.index')->withTitle('Import / Export');
    }

    public function export()
    {
    }

    public function import()
    {
        Artisan::call('db:seed', [
            '--class' => 'LogSeeder'
        ]);

        return redirect()->route('home')->withSuccess('Successfully imported!');
    }

}