@extends('layouts.master')


@section('page_title')
    Department Module
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
                    Create Department
                </div>
                <div class="card-body">
                    <form action="{{route('departments.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 mt-2">
                                <x-label>Code</x-label>
                                <x-input-text name="dept_code"></x-input-text>
                                <x-validation name="dept_code"></x-validation>
                            </div>
                            <div class="col-4 my-2">
                                <x-label>Department</x-label>
                                <x-input-text name="dept_desc"></x-input-text>
                                <x-validation name="dept_code"></x-validation>
                            </div>

                            <div class="col-12 my-2">
                                <x-btn>Save</x-btn>
                                <a class="float-end" href="{{route('departments.index')}}">Back</a>
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



