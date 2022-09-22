@extends('layouts.base')

@section('title')
    Devstagram
@endsection

@section('content')
    <h1 class="text-4xl mb-10">Register</h1>
    <div class="md:w-2/3 flex flex-row justify-between items-center mx-auto">
        <div class="w-1/3">
            Image
        </div>
        <form action="" method="POST" class="w-2/3 mx-auto mt-8">
            @csrf
            <div class="w-full flex flex-row items-center mb-4">
                <label for="name" class="w-1/3 mr-4">Name:</label>
                <input type="text" id="name" name="name"
                    class="w-full border rounded-lg p-2 @error('name') border-red-500 @enderror " required
                    value="{{ old('name') }}" />
            </div>
            @error('name')
                <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
            @enderror
            <div class="w-full flex flex-row items-center mb-4">
                <label for="email" class="w-1/3 mr-4">Email:</label>
                <input type="text" id="email" name="email"
                    class="w-full border rounded-lg p-2 @error('email') border-red-500 @enderror " required
                    value="{{ old('email') }}" />
            </div>
            @error('email')
                <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
            @enderror
            <div class="w-full flex flex-row items-center mb-4">
                <label for="password" class="w-1/3 mr-4">Password:</label>
                <input type="password" id="password" name="password"
                    class="w-full border rounded-lg p-2 @error('password') border-red-500 @enderror " required
                    value="{{ old('password') }}" />
            </div>
            @error('password')
                <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
            @enderror
            <div class="w-full flex flex-row items-center mb-4">
                <label for="password_confirmation" class="w-1/3 mr-4">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full border rounded-lg p-2 @error('password-confrimation') border-red-500 @enderror " required
                    value="{{ old('password_confirmation') }}" />
            </div>
            @error('password_confirmation')
                <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
            @enderror
            <div class="text-center">
                <button type='submit'
                    class="bg-lime-300 hover:bg-lime-500 p-2 rounded-lg transition-colors uppercase">Create account</button>
            </div>

        </form>
    </div>
@endsection
