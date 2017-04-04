<?php namespace App\Composers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GlobalComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $view->with('user', $user);
        $view->with('mail', $user->messages()->with('sender')->unread()->get());
    }
}