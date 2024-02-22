@php

$class ??= null;


@endphp

<div @class(["form-check form-switch", $class])>
    <input type="hidden" value="0" name="{{ $name }}">
    <input @checked(old($name, $value ?? false)) type="checkbox" role="switch" value="1" class="form-check-input @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>