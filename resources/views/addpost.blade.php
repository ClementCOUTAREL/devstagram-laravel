@extends('layouts.base')

@section('title')
    Devstagram
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
@endpush

@section('content')
    <h1 class="text-4xl mb-10">Create Post</h1>
    <div class="md:w-3/4 flex flex-row justify-between items-center mx-auto">
        <div class="w-1/3">
            <form enctype="multipart/form-data" id="dropzone" action="{{ route('upload') }}" method="POST"
                class="dropzone mr-4">
                @csrf
            </form>
        </div>
        <form action="" method="POST" class="w-2/3 mx-auto mt-8">
            @csrf
            <div class="w-full flex flex-row items-center mb-4">
                <label for="title" class="w-1/3 mr-4">Title:</label>
                <input type="text" id="title" name="title"
                    class="w-full border rounded-lg p-2 @error('title') border-red-500 @enderror " required
                    value="{{ old('title') }}" />
            </div>
            @error('title')
                <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
            @enderror
            <div class="w-full flex flex-row items-center mb-4">
                <label for="content" class="w-1/3 mr-4">Your post:</label>
                <textarea id="content" name="content" class="w-full border rounded-lg p-2 @error('content') border-red-500 @enderror "
                    required value="{{ old('content') }}"></textarea>
            </div>
            @error('content')
                <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
            @enderror
            <div>
                <input type="hidden" name="image_url" value="{{ old('image_url') }}">
            </div>
            @error('image_url')
                <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
            @enderror
            <div class="text-center">
                <button type='submit'
                    class="bg-lime-300 hover:bg-lime-500 p-2 rounded-lg transition-colors uppercase">Publish</button>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function(file, response) {
                document.querySelector('[name="image_url"]').value = response.image
            },
            error: function(file, response) {
                document.querySelector('[name="image_url"]').value = ""
                return false;
            },
        };
    </script>
@endsection
