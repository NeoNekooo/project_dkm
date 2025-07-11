<?php

namespace App\Http\Controllers;

use App\Models\Amalan;
use Illuminate\Http\Request;

class AmalanUserController extends Controller
{
    public function index()
    {

        $amalans = Amalan::orderBy('kategori')
                           ->orderBy('urutan')
                           ->get()
                           ->groupBy('kategori');

        return view('pages.user.amalan.index', compact('amalans'));
    }
}