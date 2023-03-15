@php
    $name = $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-select form-select-sm is-invalid" :
    "form-select form-select-sm";
@endphp

<select name="{{$name}}" {{$attributes->merge(['class' => $class])}}>
    <option value="" disabled selected>Choose </option>
    {{$slot}}
</select>
