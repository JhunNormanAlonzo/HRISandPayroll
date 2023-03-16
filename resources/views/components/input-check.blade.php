@props(['check' => '0'])

@php
    $name = $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-check-input is-invalid" :
    "form-check-input ";
@endphp



<input type="checkbox" {{$check == '1' ? "checked" : ""}} {{$attributes->merge(['class' => $class])}} {{old($name) ? "checked" : ''}} >

