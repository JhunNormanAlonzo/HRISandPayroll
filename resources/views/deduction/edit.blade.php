@extends('layouts.master')


@section('page_title')
    Deductions Module
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
                    Update Deduction
                </div>
                <div class="card-body">
                    <form action="{{route('deductions.update', [$deduction->wd_id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-4 my-2">
                                <x-label>Description</x-label>
                                <x-input-text value="{{$deduction->wd_desc}}" name="wd_desc"></x-input-text>
                                <x-validation name="wd_desc"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Value</x-label>
                                <x-input-number value="{{$deduction->wd_value}}" name="wd_value"></x-input-number>
                                <x-validation name="wd_value"></x-validation>
                            </div>

                            <div class="col-8 my-2">
                                <div class="row">
                                    <div class="col-4 my-2">
                                        <x-label>Tax?</x-label>
                                        <x-input-check name="istax" check="{{$deduction->istax}}" value="1"></x-input-check>
                                        <x-validation name="istax"></x-validation>
                                    </div>

                                    <div class="col-4 my-2">
                                        <x-label>CompRate</x-label>
                                        <x-select name="c_rate">
                                            <option {{$deduction->c_rate == "MONTHLY" ? "selected" : ""}} value="MONTHLY">MONTHLY</option>
                                            <option {{$deduction->c_rate == "HALF-MONTH" ? "selected" : ""}} value="HALF-MONTH">HALF-MONTH</option>
                                            <option {{$deduction->c_rate == "DAILY" ? "selected" : ""}} value="DAILY">DAILY</option>
                                            <option {{$deduction->c_rate == "HOURLY" ? "selected" : ""}} value="HOURLY">HOURLY</option>
                                            <option {{$deduction->c_rate == "MINUTE" ? "selected" : ""}} value="MINUTE">MINUTE</option>
                                        </x-select>
                                        <x-validation name="c_rate"></x-validation>
                                    </div>

                                    <div class="col-4 my-2">
                                        <x-label>ExAnnual</x-label>
                                        <x-input-check check="{{$deduction->ex_annual}}"  name="ex_annual" value="1"></x-input-check>
                                        <x-validation name="ex_annual"></x-validation>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 my-2">
                                <x-btn>Update</x-btn>
                                <a class="float-end" href="{{route('deductions.index')}}">Back</a>
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



