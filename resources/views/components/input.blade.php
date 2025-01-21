<div class="p-2">
    <label class="w-5/12" for="{{ $id ?? strtolower($name) }}">
        {{ $label }}
    </label>
    <input
        type="text"
        class="w-7/12 border-grey-500"
        name="{{ $name }}"
        value="{{ $value ?? '' }}"
        id="{{ $id ?? strtolower($name) }}"
    >
    @if($errors->has($name))
    <div>{{ $errors->first($name) }}</div>
    @endif
</div>
