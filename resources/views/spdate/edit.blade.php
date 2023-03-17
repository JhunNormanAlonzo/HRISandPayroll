@extends('layouts.master')


@section('page_title')
    Special Date Module
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
                    Update Special Date
                </div>
                <div class="card-body">
                    <form action="{{route('spdates.update', [$spdate->sp_ctrl])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Date</x-label>
                                <x-input-date value="{{$spdate->sp_date}}" name="sp_date"></x-input-date>
                                <x-validation name="sp_date"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Holiday</x-label>
                                <x-input-text  value="{{$spdate->holiday}}" name="holiday"></x-input-text>
                                <x-validation name="holiday"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Type</x-label>
                                <x-select  name="type">
                                    <option @if(isset($spdate->type)) selected @endif value="LEGAL HOLIDAY">LEGAL HOLIDAY</option>
                                    <option @if(isset($spdate->type)) selected @endif value="SUNDAY/REST/SPECIAL">SUNDAY/REST/SPECIAL</option>
                                    <option @if(isset($spdate->type)) selected @endif value="COMPANY HOLIDAY">COMPANY HOLIDAY</option>
                                </x-select>
                                <x-validation name="type"></x-validation>
                            </div>


                            <div class="col-12 my-2">
                                <x-btn>Update</x-btn>
                                <a class="float-end" href="{{route('spdates.index')}}">Back</a>
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



