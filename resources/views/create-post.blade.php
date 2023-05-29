@extends('layouts.app')

@section('contents')
    <div class="w-full flex justify-center items-center pb-10">
        <form class="w-2/4" action="/create-post" method="POST">
            @csrf

            <h1 class="text-4xl my-5 font-semibold">Create Post</h1>
            
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Post Title</label>
                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Post Title">
            </div>
            <div class="mb-6">                
                <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900">Post Summary</label>
                <textarea id="excerpt" name="excerpt" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Post Summary"></textarea>
            </div>
            <div class="mb-6">                
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Post Category</label>
                <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value={{$category->id}}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">                
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Post Body</label>
                <textarea id="body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Post Body"></textarea>
            </div>
            <button type="submit" class="text-white bg-slate-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
@endsection