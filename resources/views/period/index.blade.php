@extends('layouts.master')

@section('page_title')
    Period Definitions
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
                    <h5>List of Periods</h5>
                    <a href="{{route('periods.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Create period</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th>From</x-th>
                            <x-th>To</x-th>
                            <x-th>PName</x-th>
                            <x-th>PMY</x-th>
                            <x-th>Days</x-th>
                            <x-th>Posted</x-th>
                            <x-th>Closed</x-th>
                            <x-th>30TH</x-th>
                            <x-th>LogPro</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($periods as $period)
                                <x-tr>
                                    <x-td>{{$period->pfrom}}</x-td>
                                    <x-td>{{$period->pto}}</x-td>
                                    <x-td>{{$period->pname}}</x-td>
                                    <x-td>{{$period->pmy}}</x-td>
                                    <x-td>{{$period->pdays}}</x-td>
                                    <x-td>{{$period->posted}}</x-td>
                                    <x-td>{{$period->closed}}</x-td>
                                    <x-td>{{$period->is30th}}</x-td>
                                    <x-td>{{$period->logpro}}</x-td>
                                    <x-td>
                                        <a href="{{route('periods.edit', [$period->per_uid])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#destroy{{$period->per_uid}}">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <form action="{{route('periods.destroy', [$period->per_uid])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="destroy{{$period->per_uid}}">
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
        $title = "Periods";
        $columns = "0,1";
        $target = null;
        $orientation = "portrait";
        $pageSize = "LEGAL";
    @endphp
    <x-datatable :title="$title" :columns="$columns" :target="$target" :orientation="$orientation" :pageSize="$pageSize"></x-datatable>
@endsection


