<div class="pb-2 flex max-w-screen-sm">
    <label class="w-3/12" for="{{ $id ?? strtolower($name) }}">
        {{ $label }}
    </label>
    <input
        type="text"
        class="w-9/12 border border-gray-500 rounded"
        name="{{ $name }}"
        value="{{ $value ?? '' }}"
        id="{{ $id ?? strtolower($name) }}"
    >
    @if($errors->has($name))
    <div>{{ $errors->first($name) }}</div>
    @endif
</div>
