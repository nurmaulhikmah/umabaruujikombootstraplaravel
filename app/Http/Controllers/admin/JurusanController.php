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
            'nama_jurusan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('jurusan', 'public');

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'deskripsi' => $request->deskripsi,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama_jurusan' => $request->nama_jurusan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('logo')) {
            if ($jurusan->logo && Storage::disk('public')->exists($jurusan->logo)) {
                Storage::disk('public')->delete($jurusan->logo);
            }
            $data['logo'] = $request->file('logo')->store('jurusan', 'public');
        }

        $jurusan->update($data);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui!');
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