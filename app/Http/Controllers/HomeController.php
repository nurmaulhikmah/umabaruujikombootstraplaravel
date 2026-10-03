<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri; 
use App\Models\Jurusan;

class HomeController extends Controller
{
    public function index()
    {
        $latestBeritas = Berita::latest()->take(3)->get();
        $galleries   = Galeri::latest()->take(6)->get(); 
        $jurusans    = Jurusan::all();
        
        return view('home', compact('latestBeritas', 'galleries', 'jurusans'));
    }
}