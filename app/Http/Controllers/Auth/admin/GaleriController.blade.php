<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan foto ke folder storage/app/public/galeri
        $path = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'judul_foto' => $request->judul_foto,
            'foto' => $path,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diunggah!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus file fisik dari storage
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}