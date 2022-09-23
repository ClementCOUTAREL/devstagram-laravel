<div>
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset('uploads') . '/' . $post->image_url }}" alt="Image from post {{ $post->title }}">
    </a>
    <div class="flex flex-row justify-around">
        <livewire:post-edit-buttons :post='$post' />
        <livewire:like-post :post='$post' />
    </div>
</div>
