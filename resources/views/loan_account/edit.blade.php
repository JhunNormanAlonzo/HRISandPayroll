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
                    Update Loan
                </div>

                <div class="card-body">
                    <form action="{{route('loan_accounts.update', [$loan_account->la_uid])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Employee</x-label>
                                <x-input-text name="emp_ctrl" value="{{$loan_account->emp_name}}" list="employees"></x-input-text>
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
                                        <option @if($loan_account->wd_id == $deduction->wd_id) selected @endif value="{{$deduction->wd_id}}">{{$deduction->wd_desc}}</option>
                                    @endforeach
                                </x-select>
                                <x-validation name="wd_id"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Date Posted</x-label>
                                <x-input-datetime name="la_date" value="{{$loan_account->la_date}}"></x-input-datetime>
                                <x-validation name="la_date"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Reference</x-label>
                                <x-input-text name="reference" value="{{$loan_account->reference}}"></x-input-text>
                                <x-validation name="reference"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Description</x-label>
                                <x-input-text name="description" value="{{$loan_account->description}}"></x-input-text>
                                <x-validation name="description"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Loan Type</x-label>
                                <x-input-text name="loan_type" value="{{$loan_account->loan_type}}"></x-input-text>
                                <x-validation name="loan_type"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Loan Amount</x-label>
                                <x-input-number name="loan_amount"  value="{{$loan_account->loan_amount}}"></x-input-number>
                                <x-validation name="loan_amount"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Check Amount</x-label>
                                <x-input-number name="check_amount"  value="{{$loan_account->check_amount}}"></x-input-number>
                                <x-validation name="check_amount"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Date Granted</x-label>
                                <x-input-date name="date_granted" value="{{$loan_account->date_granted}}" ></x-input-date>
                                <x-validation name="date_granted"></x-validation>
                            </div>

                            <div class="col-3 my-2">
                                <x-label>Coll Period</x-label>
                                <x-input-text name="coll_period" value="{{$loan_account->coll_period}}"></x-input-text>
                                <x-validation name="coll_period"></x-validation>
                            </div>


                            <div class="col-4 my-2">
                                <div class="row">
                                    <div class="col-12 my-2">
                                        <x-label>Amount Balance</x-label>
                                        <x-input-number name="amount" id="amount" value="{{$loan_account->amount}}" ></x-input-number>
                                        <x-validation name="amount"></x-validation>
                                    </div>

                                    <div class="col-12 my-2">
                                        <x-label>Terms</x-label>
                                        <x-input-number name="split" id="split" min="1" value="{{$loan_account->split}}" ></x-input-number>
                                        <x-validation name="split"></x-validation>
                                    </div>


                                    <div class="col-12 my-2">
                                        <x-label>Current Term</x-label>
                                        <x-input-number name="split_val" value="{{$loan_account->split_val}}"></x-input-number>
                                        <x-validation name="split_val"></x-validation>
                                    </div>

                                    <div class="col-12 my-2">
                                        <x-label>Pay Amount</x-label>
                                        <x-input-number name="pay_amt" id="amortization" value="{{$loan_account->pay_amt}}"></x-input-number>
                                        <x-validation name="pay_amt"></x-validation>
                                    </div>

                                    <div class="col-12 my-2">
                                        <x-label>Balance</x-label>
                                        <x-input-number name="balance" id="balance" value="{{$loan_account->balance}}"></x-input-number>
                                        <x-validation name="balance"></x-validation>
                                    </div>

                                    <div class="col-12 my-2">
                                        <x-input-check name="isactive" check="{{$loan_account->isactive}}" value="1"></x-input-check>
                                        <label class="text-sm text-muted">Is Active</label>
                                    </div>

                                </div>
                            </div>




                            <div class="col-12 my-2">
                                <x-btn>Update</x-btn>
                                <a class="float-end" href="{{route('loan_accounts.index')}}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        // var balance = $("#balance").val();
        // var split = $("#split").val();
        var amortization;
        var balance;
        var split;


        $("#amount").on('keyup', function(){
            balance = $(this).val();
            split = $("#split").val();
            computeAmortization(balance, split)
        });

        $("#split").on('click', function(){
            this.select();
        });

        $("#split").on('keyup', function(){
            split = $(this).val();
            if(split === ''){
                split = 1;
                $(this).val(split).delay(1000);
            }
            balance = $("#balance").val();
            computeAmortization(balance, split)
        });

        function computeAmortization(balance, split){
            amortization = balance / split;
            $("#amortization").val(amortization);
        }




    </script>
@endsection



