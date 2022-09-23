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
            <div class="w-full flex flex-row items-center mb-4">
                <h3>Title:</h3>
                <p class=""> {{ $post->title }} </p>
            </div>
            <div class="w-full flex flex-col mb-8">
                <h3>Content:</h3>
                <p class="">
                    {{ $post->content }}
                </p>
            </div>
            @auth
                <div>
                    <a href="{{ route('post.edit', $post->id) }}"
                        class="bg-lime-300 hover:bg-lime-500 p-2 rounded-lg transition-colors uppercase">Modify post</a>
                </div>
            @endauth
        </div>
    </div>
    </div>
@endsection
