@extends('layouts.master')


@section('page_title')
    Division Module
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
                    Update Division
                </div>
                <div class="card-body">
                    <form action="{{route('divisions.update', [$division->s_uid])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-4 my-2">
                                <x-label>Division Code</x-label>
                                <x-input-text name="sectioncode" value="{{$division->sectioncode}}"></x-input-text>
                                <x-validation name="sectioncode"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Division</x-label>
                                <x-input-text name="sectionname" value="{{$division->sectionname}}"></x-input-text>
                                <x-validation name="sectionname"></x-validation>
                            </div>

                            <div class="col-12 my-2">
                                <x-btn>Update</x-btn>
                                <a class="float-end" href="{{route('divisions.index')}}">Back</a>
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



