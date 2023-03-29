@extends('layouts.master')


@section('page_title')
    Contributions Module
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-lg-12">
            <x-alert></x-alert>
            <form action="{{route('contribution.post')}}" method="POST">
                @csrf
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tag" id="exampleRadio1" value="sss">
                                    <label class="form-check-label" for="exampleRadio1">
                                        SSS
                                    </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tag" id="exampleRadio2" value="pagibig">
                                    <label class="form-check-label" for="exampleRadio2">
                                        Pagibig
                                    </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tag" id="exampleRadio2" value="philhealth">
                                    <label class="form-check-label" for="exampleRadio2">
                                        Philhealth
                                    </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tag" id="exampleRadio2" value="sss_loan">
                                    <label class="form-check-label" for="exampleRadio2">
                                        SSS Loan
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tag" id="exampleRadio2" value="pgibig_loan">
                                    <label class="form-check-label" for="exampleRadio2">
                                        Pag-ibig Loan
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <x-validation name="tag"></x-validation>
                            </div>
                        </div>



                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Employee </x-label>
{{--                                <x-input-text name="employee" placeholder="leave blank if you want to select all"  list="employees"></x-input-text>--}}
{{--                                <datalist id="employees">--}}
{{--                                    @foreach($employees as $employee)--}}
{{--                                        <option value="{{$employee->emp_name}}"></option>--}}
{{--                                    @endforeach--}}
{{--                                </datalist>--}}
                                <x-datalist :data="$employees" name="employee" :column="'emp_name'"></x-datalist>
                                <x-validation name="employee"></x-validation>
                            </div>
                            <div class="col-4 my-2">
                                <x-label>Period</x-label>
                                <x-datalist :data="$periods" name="period" :column="'pname'"></x-datalist>
                                <x-validation name="period"></x-validation>
                            </div>

                        </div>
                        <x-btn>View</x-btn>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection


@section('script')

@endsection



