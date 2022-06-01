<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\category;
use App\Models\contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) {


            if (request("ls")) session()->put("lisan",request("ls"));
            else if(!session()->get("lisan")) session()->put("lisan","tr");


            $vars = new \ArrayObject();

           if (session()->get("lisan") == "tr") $vars->menu = category::where('parent_id', '=', 62)->orderBy('sort')->get();
           else if (session()->get("lisan") == "it") $vars->menu = category::where('parent_id', '=', 98)->orderBy('sort')->get();
            $vars->contact = contact::first();
            $view->with(compact('vars'));
        });

    }
}
