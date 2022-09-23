<form wire:submit.prevent="submit" novalidate class="w-2/3 mx-auto mt-8">
    @csrf
    <div class="w-full flex flex-row items-center mb-4">
        <label for="email" class="w-1/3 mr-4">Email:</label>
        <input type="text" id="email" wire:model="email"
            class="w-full border rounded-lg p-2 @error('email') border-red-500 @enderror " required>
    </div>
    @error('email')
        <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
    @enderror
    <div class="w-full flex flex-row items-center mb-4">
        <label for="password" class="w-1/3 mr-4">Password:</label>
        <input type="password" id="password" wire:model="password"
            class="w-full border rounded-lg p-2 @error('password') border-red-500 @enderror " required />
    </div>
    @error('password')
        <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
    @enderror
    <div class="w-full flex flex-row items-center mb-4">
        <input type="checkbox" name="remember" id="remember" class="mr-4"><label for="remember">Remember
            me</label></input>
    </div>
    <div class="text-center">
        <button type='submit'
            class="bg-lime-300 hover:bg-lime-500 p-2 rounded-lg transition-colors uppercase">Login</button>
    </div>

</form>
