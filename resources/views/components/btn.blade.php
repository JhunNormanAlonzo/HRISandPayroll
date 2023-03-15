@props(['type' => 'submit', 'tag' => 'btn-primary'])

<button type="{{$type}}" {{$attributes->merge(['class' => 'btn btn-sm '.$tag])}}>{{$slot}}</button>
