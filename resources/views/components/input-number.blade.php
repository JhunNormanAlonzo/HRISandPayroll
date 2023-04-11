@php
    $name = $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-control form-control-sm is-invalid" :
    "form-control form-control-sm ";
@endphp

<input type="number" {{$attributes->merge(['class' => $class])}}  step=".01" value="{{old($name) ? old($name) : ''}}">
