<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(6)->get();
        
        return view('home', compact('latestPosts', 'galleries'));
    }
}