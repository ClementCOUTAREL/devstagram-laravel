<div class="w-1/2">
    @if ($url)
        <img src="{{ asset('uploads') . '/' . $url }}" alt="" class="w-full" />
    @else
        <img src="{{ asset('images') . '/' . 'avatar_default.jpg' }}" alt="" class="w-full" />
    @endif
</div>
