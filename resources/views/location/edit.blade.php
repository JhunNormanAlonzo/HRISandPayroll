@extends('layouts.master')


@section('page_title')
    Location Module
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-lg-12">
            <x-alert></x-alert>
            <div class="card mt-3">
                <div class="card-header">
                    Update Location
                </div>
                <div class="card-body">
                    <form action="{{route('locations.update', [$location->loc_code])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Location Description</x-label>
                                <x-input-text name="location" value="{{$location->location}}"></x-input-text>
                                <x-validation name="location"></x-validation>
                            </div>

                            <div class="col-12 my-2">
                                <x-btn>Update</x-btn>
                                <a class="float-end" href="{{route('locations.index')}}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection



