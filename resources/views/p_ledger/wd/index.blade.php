@extends('layouts.master')


@section('page_title')
    Wage / Deduction Module
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
                    Wage Deduction Fetcher
                </div>
                <div class="card-body">
                    <form id="my-form" action="{{route('ledger_wds.show_search')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Period</x-label>
                                <x-datalist name="period" :data="$periods" column="pname" id="input"></x-datalist>
                                <x-validation name="period"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Employee</x-label>
                                <x-datalist name="emp_ctrl" :data="$employees" column="emp_name" id="input"></x-datalist>
                                <x-validation name="emp_ctrl"></x-validation>
                            </div>


                            <div class="col-12 my-2">
                                <x-btn>Search <i class="bi bi-search"></i> </x-btn>
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



