<div>
    <div class="w-full flex flex-row items-center mb-4">
        <label for="{{ $field }}" class="w-1/3 mr-4">{{ $fieldName }}</label>
        <input type="{{ $type }}" id="{{ $field }}" name="{{ $field }}"
            class="w-full border rounded-lg p-2 @error('{{ $field }}') border-red-500 @enderror " required
            value="{{ old($field) }}" />
    </div>
    @error('{{ $field }}')
        <p class="block bg-red-300 text-black border-red-500 mb-4 p-3 rounded-sm">{{ $message }}</p>
    @enderror
</div>
