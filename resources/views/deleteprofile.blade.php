@extends('layouts.base')

@section('title')
    Devstagram
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
@endpush


@section('content')
    <h1 class="text-4xl mb-8 font-bold">Delete your Profile</h1>

    <div>
        <h2>Are you really sure to delete your profile ?</h2>

        <h3>To continue, please fill in the form below with "DELETE ACCOUNT" :</h3>

        <form action="" method="POST" novalidate>
            @csrf
            @method('delete')
            <label for="delete">Please enter "DELETE ACCOUNT" to process:</label>
            <input type="text" name="delete" value="">
            <button type="submit">Delete</button>
            @error('delete')
                <p class="bg-red-500">{{ $message }}</p>
            @enderror
        </form>
    </div>
@endsection
