@php
    $name = $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-control form-control-sm form-control-file is-invalid" :
    "form-control form-control-sm form-control-file";
@endphp

<input type="file" {{$attributes->merge(['class' => $class])}}>
