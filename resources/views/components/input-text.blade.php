@php
    $name = $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-control form-control-sm is-invalid" :
    "form-control form-control-sm ";
@endphp

<input type="text" {{$attributes->merge(['class' => $class])}}  value="{{old($name) ? old($name) : ''}}">
