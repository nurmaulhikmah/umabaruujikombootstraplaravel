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
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'gambar'    => $path,
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada di storage
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            // Simpan gambar baru
            $path = $request->file('gambar')->store('galeri', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $path = $galeri->gambar;
        }

        $galeri->update([
            'gambar'    => $path,
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }
}