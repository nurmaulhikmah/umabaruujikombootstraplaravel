<?php 

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count(); 
        $totalGaleri = Galeri::count(); 

        return view('admin.dashboard', compact('totalBerita', 'totalGaleri'));
    }
}