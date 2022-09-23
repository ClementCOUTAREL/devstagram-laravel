@extends('layouts.base')

@section('title')
    Devstagram
@endsection

@section('content')
    <h1 class="text-4xl mb-10">Login</h1>
    <div class="md:w-2/3 flex flex-row justify-between items-center mx-auto">

        @livewire('form.login')
    </div>
@endsection
