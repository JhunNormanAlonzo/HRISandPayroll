@extends('layouts.master')

@section('page_title')
    SSS Contributions
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
                    <h5>List of SSS Contribution</h5>
                    <a href="{{route('ssstables.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Create SSS Contribution</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th>Bracket</x-th>
                            <x-th>From</x-th>
                            <x-th>To</x-th>
                            <x-th>Sal. Credit</x-th>
                            <x-th>COSSS</x-th>
                            <x-th>MCR</x-th>
                            <x-th>EC</x-th>
                            <x-th>EMPSSS</x-th>
                            <x-th>EMPMCR</x-th>
                            <x-th>Total</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($ssstables as $ssstable)
                                <x-tr>

                                    <x-td>{{$ssstable->bracket}}</x-td>
                                    <x-td>{{$ssstable->rangel}}</x-td>
                                    <x-td>{{$ssstable->rangeh}}</x-td>
                                    <x-td>{{$ssstable->salcredit}}</x-td>
                                    <x-td>{{$ssstable->cosss}}</x-td>
                                    <x-td>{{$ssstable->comcr}}</x-td>
                                    <x-td>{{$ssstable->coec}}</x-td>
                                    <x-td>{{$ssstable->empsss}}</x-td>
                                    <x-td>{{$ssstable->empmcr}}</x-td>
                                    <x-td>{{$ssstable->totalcon}}</x-td>
                                    <x-td>
                                        <a href="{{route('ssstables.edit', [$ssstable->ssscode])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#destroy{{$ssstable->ssscode}}">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <form action="{{route('ssstables.destroy', [$ssstable->ssscode])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="destroy{{$ssstable->ssscode}}">
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


