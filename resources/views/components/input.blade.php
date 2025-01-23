<div class="pb-2">
    <div class="flex max-w-lg">
        <label class="w-3/12" for="{{ strtolower($name) }}">
            {{ $label }}
        </label>
        <input
            type="text"
            class="w-9/12 border border-gray-500 rounded"
            name="{{ $name }}"
            value="{{ old($name) ?? ($value ?? '') }}"
            id="{{ strtolower($name) }}"
        >
    </div>
    @if($errors->has($name))
    <div class="text-red-600 w-12/12">{{ $errors->first($name) }}</div>
    @endif
</div>
