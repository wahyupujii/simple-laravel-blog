<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index () {
        return view('create-post', [
            'title'         => 'Create Post',
            'categories'    => Category::all(),
        ]);
    }

    public function show (Post $post) {
        $post = Post::with(['user', 'category'])->firstWhere('slug', $post->slug);

        return view('post-detail', [
            'title' => 'Detail Post',
            'post'  => $post
        ]);
    }

    public function store (Request $request) {
        $request->validate([
            'category_id'   => 'required',
            'title'         => 'required',
            'excerpt'       => 'required',
            'body'          => 'required'
        ]);
        
        if (!$request->has('image')) {
            $request['image'] = 'https://via.placeholder.com/360x360.png/00bbcc?text=animals+cats+vero';
        }

        $post = Post::create([
            'user_id'       => Auth::id(),
            'category_id'   => $request['category_id'],
            'title'         => $request['title'],
            'excerpt'       => $request['excerpt'],
            'body'          => $request['body'],
            'image'         => $request['image'],
        ]);

        if ($post) {
            return redirect('/my-post')->with('success', 'Success create a post');
        }

        return back()->with('error', 'Cannot create a post');
    }

    public function destroy (Post $post) {
        $deletedPost = $post->delete();

        if ($deletedPost) {
            return redirect('/my-post')->with('success', 'Post has been deleted');
        }

        return redirect('/my-post')->with('error', 'Post delete unsuccessful');
    }

    public function updatePage (Post $post) {
        if (Auth::id() == $post->user->id) {
            return view('update-post', [
                'title'         => 'Update Post',
                'post'          => $post,
                'categories'    => Category::all()
            ]);
        }
        return redirect('/');
    }

    public function update (Request $request, Post $post) {
        $post->title = $request['title'];
        $post->excerpt = $request['excerpt'];
        $post->category_id = $request['category_id'];
        $post->body = $request['body'];

        $post->save();

        return redirect('/posts/'.$post->slug)->with('success', 'Post edit successfully');
    }
}
