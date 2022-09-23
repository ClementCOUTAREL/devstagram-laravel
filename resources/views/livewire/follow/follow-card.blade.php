<a href="{{ route('home', $follow->name) }}" class="flex flex-col items-center">
    <livewire:profile.profile-image :url='$follow->image_url' />
    <h4 class="text-2xl font-bold my-4">{{ $follow->name }}</h4>
</a>
