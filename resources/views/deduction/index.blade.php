@extends('layouts.master')

@section('page_title')
    Deductions
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
                    <h5>List of Deductions</h5>
                    <a href="{{route('deductions.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Create Deduction</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th hidden>UID</x-th>
                            <x-th>Description</x-th>
                            <x-th>Value</x-th>
                            <x-th>Tax</x-th>
                            <x-th>CompRate</x-th>
                            <x-th>ExclAnnual</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($deductions as $deduction)
                                <x-tr>
                                    <x-td hidden>{{$deduction->wd_uid}}</x-td>
                                    <x-td>{{$deduction->wd_desc}}</x-td>
                                    <x-td>{{$deduction->wd_value}}</x-td>
                                    <x-td>{{$deduction->istax}}</x-td>
                                    <x-td>{{$deduction->c_rate}}</x-td>
                                    <x-td>{{$deduction->ex_annual}}</x-td>
                                    <x-td>
                                        <a href="{{route('deductions.edit', [$deduction->wd_id])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#destroy{{$deduction->wd_id}}">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <form action="{{route('deductions.destroy', [$deduction->wd_id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="destroy{{$deduction->wd_id}}">
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
        $title = "Deductions";
        $columns = "1,2,3,4,5";
        $target = null;
        $orientation = "portrait";
        $pageSize = "LEGAL";
    @endphp
    <x-datatable :title="$title" :columns="$columns" :target="$target" :orientation="$orientation" :pageSize="$pageSize"></x-datatable>
@endsection


