@extends('layouts.base')

@section('title')
    Devstagram
@endsection


@section('content')
    <div class="flex flex-row justify-center items-center mb-12">
        <h1 class="text-4xl font-bold text-center mr-20">{{ $user->name }}</h1>
        @if ($user->id !== auth()->user()->id)
            @if ($user->followed(auth()->user()))
                <form action="{{ route('unfollow', $user->name) }}" method="POST" class="flex flex-row items-center">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Unfollow"
                        class="text-xl my-8 bg-red-400 hover:bg-sky-500 transition-colors p-2 rounded-lg font-bold uppercase" />
                </form>
            @else
                <form action="{{ route('follow', $user->name) }}" method="POST" class="flex flex-row items-center">
                    @csrf
                    <input type="submit" value="Follow"
                        class="text-xl my-8 bg-sky-300 hover:bg-sky-500 transition-colors p-2 rounded-lg font-bold uppercase" />
                </form>
            @endif
        @endif
    </div>

    <div class="w-full flex md:flex-row flex-col items-center mx-auto">
        <div class="w-1/2 mr-8">
            @if ($user->image_url)
                <img src="{{ asset('uploads') . '/' . $user->image_url }}" alt="" class="w-full" />
            @else
                <img src="{{ asset('images') . '/' . 'avatar_default.jpg' }}" alt="" class="w-full" />
            @endif
        </div>
        <div class="w-1/2 flex flex-col items-center">
            <p class="text-xl my-4">Followers</p>
            <p class="text-xl my-4">Followed</p>
            <p class="text-xl my-4"> {{ $posts->count() }} Posts</p>
            <a class="text-xl my-8 bg-sky-300 hover:bg-sky-500 transition-colors p-2 rounded-lg font-bold uppercase"
                href="{{ route('post.create') }}">Create
                post</a>
        </div>
    </div>
    <div>
        <h3 class="text-3xl font-bold my-8">Posts</h3>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ asset('uploads') . '/' . $post->image_url }}"
                                alt="Image from post {{ $post->title }}">
                        </a>
                        @auth
                            <div class="p-3 flex flex-row items-center justify-around">
                                <a class="text-xl bg-lime-400 hover:bg-lime-500 transition-colors p-2 rounded-lg font-bold uppercase"
                                    href="{{ route('post.edit', $post->id) }}">Modify</a>
                                <form
                                    class="text-xl bg-red-500 hover:bg-red-600 transition-colors p-2 rounded-lg font-bold uppercase"
                                    action="{{ route('post.destroy', $post->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete">
                                </form>
                            </div>
                        @endauth
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
