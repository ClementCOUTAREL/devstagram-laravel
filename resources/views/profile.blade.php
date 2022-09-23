@extends('layouts.base')

@section('title')
    Devstagram
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
@endpush


@section('content')
    <h1 class="text-4xl mb-8 font-bold">Your Profile</h1>

    <div class="md:w-3/4 flex md:flex-row flex-col mx-auto justify-between items-center">
        <div class="flex md:flex-row gap-4">
            <div>
                <img src="{{ auth()->user()->image_url ? asset('uploads') . '/' . auth()->user()->image_url : asset('images/avatar_default.jpg') }}"
                    alt="">
            </div>
            <form action="{{ route('profile') }}" method="POST" novalidate class="w-2/3 mx-auto mt-8"
                enctype="multipart/form-data">
                @csrf

                @if (session('message'))
                    <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ session('message') }}</p>
                @endif

                <div class="w-full flex flex-row items-center mb-4">
                    <label for="name" class="w-1/3 mr-4">Username:</label>
                    <input type="text" id="name" name="name"
                        class="w-full border rounded-lg p-2 @error('name') border-red-500 @enderror " required
                        value="{{ auth()->user()->name }}" />
                </div>
                @error('name')
                    <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
                @enderror
                <div class="w-full flex flex-row items-center mb-4">
                    <label for="image_url" class="w-1/3 mr-4">Image picture:</label>
                    <input type="file" id="image_url" name="image_url"
                        class="w-full border rounded-lg p-2 @error('image_url') border-red-500 @enderror " value=""
                        required />
                </div>
                @error('image_url')
                    <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
                @enderror
                <div class="text-center">
                    <button type='submit'
                        class="bg-lime-300 hover:bg-lime-500 p-2 rounded-lg transition-colors uppercase">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        Dropzone.options.dropzone = {
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function(file, response) {
                console.log(response);
                document.querySelector('[name="image_url"]').value = response.image
            },
            error: function(file, response) {
                document.querySelector('[name="image_url"]').value = ""
                return false;
            },
        };
    </script>
@endsection
