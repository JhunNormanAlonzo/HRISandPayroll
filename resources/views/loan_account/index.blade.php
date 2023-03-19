@extends('layouts.master')

@section('page_title')
    Employee Loan and Accounts
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
                    <h5>List of Loan</h5>
                    <a href="{{route('loan_accounts.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Create Loan</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th>Date</x-th>
                            <x-th>Employee</x-th>
                            <x-th>Type</x-th>
                            <x-th>Amount</x-th>
                            <x-th>Term</x-th>
                            <x-th>Amortization</x-th>
                            <x-th>CurrentTerm</x-th>
                            <x-th>Balance</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($loan_accounts as $loan_account)
                                <x-tr>
                                    <x-td>{{$loan_account->la_date}}</x-td>
                                    <x-td>{{$loan_account->emp_name}}</x-td>
                                    <x-td>{{$loan_account->loan_type}}</x-td>
                                    <x-td>{{$loan_account->amount}}</x-td>
                                    <x-td>{{$loan_account->split}}</x-td>
                                    <x-td>{{$loan_account->pay_amt}}</x-td>
                                    <x-td>{{$loan_account->split_val}}</x-td>
                                    <x-td>{{$loan_account->balance}}</x-td>
                                    <x-td>
                                        <a href="{{route('loan_accounts.edit', [$loan_account->la_uid])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#destroy{{$loan_account->la_uid}}">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <form action="{{route('loan_accounts.destroy', [$loan_account->la_uid])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="destroy{{$loan_account->la_uid}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            Delete
                                                            <i class="bi bi-question text-danger fa-1x"></i>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>Are you sure you want to delete ?</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-secondary">Cancel</button>
                                                            <button  type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </x-td>
                                </x-tr>
                            @endforeach
                        </x-tbody>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('datatable')
    @php
        $title = "Locations";
        $columns = "0,1";
        $target = null;
        $orientation = "portrait";
        $pageSize = "LEGAL";
    @endphp
    <x-datatable :title="$title" :columns="$columns" :target="$target" :orientation="$orientation" :pageSize="$pageSize"></x-datatable>
@endsection


