@extends('layouts.master')

@section('page_title')
    Leave Application
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <x-alert></x-alert>
            <div class="card">
                <div class="card-header">
                    <h5>Application</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('employee_leaves.store')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Leave Date</x-label>
                                <x-input-text name="lv_date" value="{{Carbon\Carbon::now()}}"></x-input-text>
                                <x-validation name="lv_date"></x-validation>
                            </div>
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
                                <x-label>Leave</x-label>
                                <x-select name="wd_id">
                                    @foreach($leaves as $leave)
                                        <option value="{{$leave->wd_id}}">{{$leave->wd_desc}}</option>
                                    @endforeach
                                </x-select>
                                <x-validation name="wd_id"></x-validation>
                            </div>
                            <div class="col-4 my-2">
                                <x-label>Reason</x-label>
                                <x-textarea name="reason"></x-textarea>
                                <x-validation name="reason"></x-validation>
                                <div class="col-4 my-2">
                                    <x-label>With Pay</x-label>
                                    <br>
                                    <x-input-check name="w_pay"></x-input-check>
                                </div>
                            </div>


                            <livewire:leave-calculator></livewire:leave-calculator>

                            <div class="col-12">
                                <x-btn >Save</x-btn>
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection


