<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        Blade::if('manager', function () {
            return @auth()->user() && auth()->user()->jabatan->slug == 'manager-operasional';
        });

        Blade::if('supervisor', function () {
            return @auth()->user() && auth()->user()->jabatan->slug == 'supervisor';
        });

        Blade::if('direktur', function () {
            return @auth()->user() && auth()->user()->jabatan->slug == 'direktur';
        });

        Blade::if('bothtop', function () {
            return @auth()->user() && (auth()->user()->jabatan->slug == 'direktur' || auth()->user()->jabatan->slug == 'manager-operasional');
        });

        Gate::define('access', function(User $user, $type) {
            return ($user->id == $type);
        });
    }
}
