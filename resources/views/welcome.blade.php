@extends('layouts.base')

@section('title')
    Devstagram
@endsection


@section('content')
    <div class="flex flex-row justify-center items-center mb-12">
        <h1 class="text-4xl font-bold text-center mr-20">{{ $user->name }}</h1>
        <livewire:follow.follow-button :user="$user" />
    </div>

    <div class="w-full flex md:flex-row flex-col items-center mx-auto">
        <livewire:profile.profile-image :url='$user->image_url' />
        <div class="w-1/2 flex flex-col items-center">
            <p class="text-xl my-4"> {{ $user->followers->count() }} @choice('Follower|Followers', $user->followers->count())</p>
            <p class="text-xl my-4"> {{ $user->followings->count() }} Followed</p>
            <p class="text-xl my-4"> {{ $posts->count() }} Posts</p>
            <a class="text-xl my-8 bg-sky-300 hover:bg-sky-500 transition-colors p-2 rounded-lg font-bold uppercase"
                href="{{ route('post.create') }}">Create post</a>
        </div>
    </div>
    <div>
        <h3 class="text-3xl font-bold my-8 ml-16">Posts</h3>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <livewire:post-details :post="$post" />
                @endforeach
            @else
                <p class="my-20 ml-28 text-3xl">This user doesn't have posts</p>
        @endif
    </div>
    <div>
        <h3 class="text-3xl font-bold my-8 ml-16">Followers</h3>
        @if ($user->followers->count())
            <div class="grid grid-cols-2">
                @foreach ($user->followers as $follower)
                    <livewire:follow.follow-card :follow="$follower" />
                @endforeach
            </div>
        @else
            <p class="my-20 ml-28 text-3xl">This user doesn't have followers</p>
        @endif
    </div>
    <div>
        <h3 class="text-3xl font-bold my-8 ml-16">Followed</h3>
        @if ($user->followings->count())
            <div class="grid grid-cols-2">
                @foreach ($user->followings as $follow)
                    <livewire:follow.follow-card :follow="$follow" />
                @endforeach
            </div>
        @else
            <p class="my-20 ml-28 text-3xl">This user doesn't follow anyone</p>
        @endif
    </div>
@endsection
