@auth
    <div class="flex flex-row gap-4 items-center">
        <a class="text-xl bg-lime-400 hover:bg-lime-500
        transition-colors p-2 rounded-lg font-bold uppercase"
            href="{{ route('post.edit', $post->id) }}">Modify</a>
        <button wire:click="destroy"
            class="uppercase text-xl bg-red-500 hover:bg-red-600 transition-colors p-2 rounded-lg font-bold">
            Delete</button>
    </div>
@endauth
