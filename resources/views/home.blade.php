@extends('layouts.app')

@section('contents')
<div class="mt-5 px-3 md:px-0">
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl">Recent Posts</h1>
        <div>
            <button id="dropDownCategories" data-dropdown-toggle="dropdownCategories" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Categories<svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownCategories" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                    @foreach ($categories as $category)
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div id="posts-area" class="mt-4 flex flex-wrap justify-between items-start">

        @foreach ($posts as $post)
            <div class="w-full max-w-sm bg-white mb-4 hover:shadow-lg hover:cursor-pointer">
                <a href="/posts/{{ $post->slug }}">
                    {{-- <div class="w-full h-40 bg-red-500"></div> --}}
                    <img src="{{ $post->image }}" alt="post-image" class="w-full h-40">
                    <div class="px-5 pb-5">
                        <div class="flex items-center justify-between my-5">
                            <span class="text-xs text-white bg-blue-500 px-2 py-1 rounded-md">{{ strtoupper($post->category->name) }}</span>
                            <span class="text-xs">March 27, 2023</span>
                        </div>
    
                        <span class="mb-3 text-sm">By : {{ $post->user->fullname }} </span>
    
                        <a href="#">
                            <h5 class="text-lg font-semibold tracking-tight text-gray-900">{{ $post->title }}</h5>
                        </a>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection