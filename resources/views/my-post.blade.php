@extends('layouts.app')

@section('contents')
<div class="mt-5 px-3 md:px-0">
    <h1 class="font-bold text-2xl">My Posts</h1>

    @if (session()->has('success'))
        <div class="flex p-4 my-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{session('success')}}
            </div>
        </div>
    @endif

    <div id="posts-area" class="mt-4 flex flex-wrap justify-between items-start">

        @foreach ($my_posts as $post)
            <div class="w-full max-w-sm bg-white mb-4 hover:shadow-lg hover:cursor-pointer">
                <a href="/posts/{{ $post->slug }}">
                    <img src="{{ $post->image }}" alt="post-image" class="w-full h-40">
                    <div class="px-5 pb-5">
                        <div class="flex items-center justify-between my-5">
                            <span class="text-xs text-white bg-blue-500 px-2 py-1 rounded-md">{{ $post->category->name }}</span>
                            <span class="text-xs">March 27, 2023</span>
                        </div>

                        <a href="#">
                            <h5 class="text-lg font-semibold tracking-tight text-gray-900">{{ $post->title }}</h5>
                        </a>
                        
                        <form action="/posts/{{ $post->slug }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white text-xs rounded-md p-2 mt-4" onclick="return confirm('Are you sure to delete ? ')">Delete Post</button>
                        </form>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection