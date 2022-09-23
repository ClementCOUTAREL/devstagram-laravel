@if ($user->id !== auth()->user()->id)
    @if ($isFollowed)
        <button wire:click='destroy'
            class="text-xl my-8 bg-red-400 hover:bg-red-500 transition-colors p-2 rounded-lg font-bold uppercase" />
        Unfollow
        </button>
    @else
        <button wire:click='follow'
            class="text-xl my-8 bg-lime-400 hover:bg-lime-500 transition-colors p-2 rounded-lg font-bold uppercase" />
        Follow
        </button>
    @endif
@endif
