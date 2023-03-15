@php
    $name = $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-control form-control-sm is-invalid" :
    "form-control form-control-sm ";
@endphp

<textarea name="{{$name}}" {{$attributes->merge(['class' => $class])}} cols="30" rows="2"></textarea>
