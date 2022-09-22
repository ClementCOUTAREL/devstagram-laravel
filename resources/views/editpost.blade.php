@extends('layouts.base')

@section('title')
    Devstagram
@endsection


@section('content')
    <h1 class="text-4xl font-bold mb-12 text-center">{{ $post->title }}</h1>

    <div class="w-full flex md:flex-row flex-col items-center mx-auto">
        <div class="w-1/2 mr-8">
            @if ($post->image_url)
                <img src="{{ asset('uploads') . '/' . $post->image_url }}" alt="" class="w-full" />
            @else
                <img src="{{ asset('images') . '/' . 'avatar_default.jpg' }}" alt="" class="w-full" />
            @endif
        </div>
        <div class="w-1/2 flex flex-col items-center">
            <form action="{{ route('post.update', $post->id) }}" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="w-full flex flex-row items-center mb-4">
                    <label for="title" class="w-1/3 mr-4">Title:</label>
                    <input type="text" name="title" value="{{ $post->title }}"
                        class="w-full border rounded-lg p-2 @error('title') border-red-500 @enderror " required>
                </div>
                @error('title')
                    <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
                @enderror
                <div class="w-full flex flex-row items-center mb-8">
                    <label for="content" class="w-1/3 mr-4">Content:</label>
                    <textarea name="content" class="w-full border rounded-lg p-2 @error('content') border-red-500 @enderror " required>
                    {{ $post->content }}
                </textarea>
                </div>
                @error('content')
                    <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
                @enderror
                <div class="text-center mt-10">
                    <button type='submit'
                        class="bg-lime-300 hover:bg-lime-500 p-2 rounded-lg transition-colors uppercase">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
