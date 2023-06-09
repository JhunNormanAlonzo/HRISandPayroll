@extends('layouts.master')


@section('page_title')
    Loan and Accounts Module
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
                    Create Loan
                </div>
                <div class="card-body">
                    <form action="{{route('loan_accounts.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Employee</x-label>
                                <x-input-text name="emp_ctrl"  list="employees"></x-input-text>
                                <datalist id="employees">
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->emp_name}}"></option>
                                    @endforeach
                                </datalist>
                                <x-validation name="emp_ctrl"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Deduction</x-label>
                                <x-select name="wd_id">
                                    @foreach($deductions as $deduction)
                                        <option value="{{$deduction->wd_id}}">{{$deduction->wd_desc}}</option>
                                    @endforeach
                                </x-select>
                                <x-validation name="wd_id"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Date Posted</x-label>
                                <x-input-datetime name="la_date" value="{{\Carbon\Carbon::now('Asia/Manila')->format('Y-m-d H:i:s ')}}"></x-input-datetime>
                                <x-validation name="la_date"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Reference</x-label>
                                <x-input-text name="reference" ></x-input-text>
                                <x-validation name="reference"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Description</x-label>
                                <x-input-text name="description" ></x-input-text>
                                <x-validation name="description"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Loan Type</x-label>
                                <x-input-text name="loan_type" ></x-input-text>
                                <x-validation name="loan_type"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Loan Amount</x-label>
                                <x-input-number name="loan_amount" ></x-input-number>
                                <x-validation name="loan_amount"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Check Amount</x-label>
                                <x-input-number name="check_amount" ></x-input-number>
                                <x-validation name="check_amount"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Date Granted</x-label>
                                <x-input-date name="date_granted" value="{{\Carbon\Carbon::now('Asia/Manila')->format('Y-m-d')}}"></x-input-date>
                                <x-validation name="date_granted"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Coll Period</x-label>
                                <x-input-text name="coll_period" ></x-input-text>
                                <x-validation name="coll_period"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <livewire:loan-and-account-computer></livewire:loan-and-account-computer>
                            </div>




                            <div class="col-12 my-2">
                                <x-btn>Save</x-btn>
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



