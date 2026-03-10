<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MenuModel;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {

           $menus = MenuModel::with('children')
                                ->whereIn('parent_id', [NULL, 0])
                                ->where('status',1)
                                ->orderBy('sort_order')
                                ->get();
            //dd($menus);
            $view->with('menus', $menus);
        });
    }
}