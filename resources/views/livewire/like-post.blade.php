<div class="p-3 flex flex-row items-center justify-around">
    @if ($post->id !== auth()->user()->id)
        <div class="flex flex-row items-center gap-4">
            <p class="text-xl font-bold"> {{ $post->likes()->count() }} Likes</p>
            <button wire:click="like"
                class="text-xl {{ $isLiked ? 'bg-red-500 hover:bg-red-600' : 'bg-lime-400 hover:bg-lime-500' }}  transition-colors p-2 rounded-lg font-bold uppercase">
                {{ $isLiked ? 'Unlike' : 'Like' }}
            </button>
        </div>
    @endif
</div>
