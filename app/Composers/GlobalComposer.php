<?php namespace App\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GlobalComposer
{
    public function compose(View $view)
    {
        $view->with('user', Auth::user());
    }
}