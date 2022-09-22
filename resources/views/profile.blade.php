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
        <div>
            <form action="" method="POST">
                <form enctype="multipart/form-data" id="dropzone" action="{{ route('upload.user', auth()->user()->name) }}"
                    method="POST" class="dropzone mr-4">
                    @csrf
                    <input type="hidden" name="image_url" value="{{ old('image_url') }}" />
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
                    <button type="submit">Save picture</button>
                </form>
                @csrf
                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}">
                <button type="submit">Edit</button>
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
