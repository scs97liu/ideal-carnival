<?php namespace App\Providers;

use App\Composers\GlobalComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            'main.*', GlobalComposer::class
        );
    }

    public function register()
    {

    }
}