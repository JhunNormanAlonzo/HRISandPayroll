
@props(['data', 'column'])

@php
    $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-control form-control-sm is-invalid " :
    "form-control form-control-sm ";
@endphp


<input type="text"  {{$attributes->merge(['class' => $class])}}  value="{{old($name) ? old($name) : ''}}" list="{{$name}}_lists">
<datalist id="{{$name}}_lists" class="position-absolute bottom-0 w-100">
    @foreach($data as $item)
        <option value="{{$item->$column}}"></option>
    @endforeach
</datalist>



