<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index () {
        return view('home',[
            'title'         => 'Home',
            'posts'         => Post::with(['user', 'category'])->latest()->get(),
            'categories'    => Category::all()
        ]);
    }
}
