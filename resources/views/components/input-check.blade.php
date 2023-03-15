@php
    $name = $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-check-input is-invalid" :
    "form-check-input ";
@endphp

<input type="checkbox" {{$attributes->merge(['class' => $class])}} {{old($name) ? "checked" : ''}} >

