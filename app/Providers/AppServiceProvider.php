<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
  use App\Models\DkmProfil;
  use App\Models\Infaq;
  use App\Models\Post;
  use App\Models\Img;
  use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\Pembangunan;
use App\Models\Amalan;
use App\Models\Organigram;
use Illuminate\Support\Facades\View;

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
            $view->with('kegiatanAktif', Kegiatan::where('status', true)
                ->whereDate('tanggal', '>=', now())
                ->orderBy('tanggal')
                ->get());
            $view->with('tags', Img::pluck('tag')->unique()->values());
            $view->with('programs', Program::all());
            $view->with('pembangunans', Pembangunan::orderBy('urutan')->get()) ;
            $view->with('user', auth()->user());
            $amalans = Amalan::all()->groupBy('kategori');
            $view->with('amalans', $amalans);
            $view->with('organigram', organigram::first());


        });
        }


}
