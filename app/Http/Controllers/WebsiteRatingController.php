<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteRating; 

class WebsiteRatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'nama' => 'nullable|string|max:100',
            'saran' => 'nullable|string|max:500',
        ]);

        WebsiteRating::create([
            'nama' => $request->nama ?? 'Pengunjung',
            'rating' => $request->rating,
            'saran' => $request->saran,
        ]);

        return back()->with('success', 'Terima kasih atas penilaian dan masukan untuk website SMKN 4 Bogor!');
    }

    public function adminIndex()
    {
        $ratings = WebsiteRating::latest()->get();
        $avgRating = WebsiteRating::avg('rating');

        return view('admin.rating.index', compact('ratings', 'avgRating'));
    }
}