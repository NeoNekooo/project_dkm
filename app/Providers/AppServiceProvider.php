<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
  use App\Models\DkmProfil;
  use App\Models\infaq;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
 

    public function boot()
    {
    view()->composer('*', function ($view) {
        $view->with('profil', DkmProfil::with('kontak')->first());
        $view->with('infaq', Infaq::all());
    });
    }

}
