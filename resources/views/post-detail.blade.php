@extends('layouts.app')

@section('contents')
    <div class="w-3/4 mx-auto flex flex-col items-center mt-5">
        
        @if (session()->has('success'))
            <div class="flex p-4 my-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{session('success')}}
                </div>
            </div>
        @endif

        <h1 class="text-3xl font-bold text-center"> {{ $post->title }} </h1>

        <span class="text-xs text-white bg-blue-500 px-2 py-1 mt-5 rounded-md">{{ strtoupper($post->category->name) }}</span>

        <p class="my-3 text-md"><span class="font-semibold">{{ $post->user->fullname }}</span> in <span>March 27, 2023</span></p>

        @if (auth()->id() == $post->user->id)
            <a href="/update-post/{{ $post->slug }}">
                <button type="submit" class="text-white bg-slate-800 hover:bg-slate-900 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center">Edit</button>
            </a>
        @endif

        <img src="{{ $post->image }}" alt="post-image" class="w-2/3 h-60 my-5">

        <p class="mt-3 text-md px-5 pb-5 text-justify">{!! $post->body !!}</p>
    </div>
@endsection