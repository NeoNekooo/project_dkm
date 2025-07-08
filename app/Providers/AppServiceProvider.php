<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
  use App\Models\DkmProfil;
  use App\Models\infaq;
  use App\Models\Post;
use App\Models\Img;

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
        $view->with('infaq', Infaq::first());
        $view->with('posts', Post::latest()->get());
        $view->with('imgs', Img::latest()->get());

    });
    }

}
