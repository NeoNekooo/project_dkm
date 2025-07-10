<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
  use App\Models\DkmProfil;
  use App\Models\infaq;
  use App\Models\Post;
  use App\Models\Img;
  use App\Models\Kegiatan;

  use Illuminate\Pagination\Paginator;
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
         Paginator::useTailwind();
         view()->composer('*', function ($view) {
            $view->with('profil', DkmProfil::with('kontak')->first());
            $view->with('infaq', Infaq::first());
            $view->with('posts', Post::latest()->get());
            $view->with('allImgs', Img::latest()->get());
            $view->with('kegiatans', Kegiatan::orderBy('tanggal', 'asc')->take(6)->get());
            $view->with('tags', Img::pluck('tag')->unique()->values());
        });
     }


}
