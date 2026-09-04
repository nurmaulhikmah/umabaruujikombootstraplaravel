<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_jurusan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('jurusan-logos', 'public');
        }

        Jurusan::create([
            'logo'         => $logoPath,
            'nama_jurusan' => $request->nama_jurusan,
            'deskripsi'    => $request->deskripsi,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan!');
    }

    // TAMBAHKAN FUNGSI EDIT INI
    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    // TAMBAHKAN FUNGSI UPDATE INI
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_jurusan' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
        ]);

        $logoPath = $jurusan->logo;
        if ($request->hasFile('logo')) {
            if ($jurusan->logo && Storage::disk('public')->exists($jurusan->logo)) {
                Storage::disk('public')->delete($jurusan->logo);
            }
            $logoPath = $request->file('logo')->store('jurusan-logos', 'public');
        }

        $jurusan->update([
            'logo'         => $logoPath,
            'nama_jurusan' => $request->nama_jurusan,
            'deskripsi'    => $request->deskripsi,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Data jurusan berhasil diperbarui!');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->logo && Storage::disk('public')->exists($jurusan->logo)) {
            Storage::disk('public')->delete($jurusan->logo);
        }
        
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', 'Data jurusan berhasil dihapus!');
    }
}