<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPostController extends Controller
{
    public function index () {
        return view('my-post', [
            'title'     => 'My Post',
            'my_posts'   => Post::with('category')->where('user_id', Auth::id())->latest()->get()
        ]);
    }
}
