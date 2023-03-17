@extends('layouts.master')

@section('page_title')
    PHIC Contributions
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
                    <h5>List of PHIC Contribution</h5>
                    <a href="{{route('phtables.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Create PHIC Contribution</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th>Bracket</x-th>
                            <x-th>From</x-th>
                            <x-th>To</x-th>
                            <x-th>Sal. Base</x-th>
                            <x-th>Personal</x-th>
                            <x-th>Employer</x-th>
                            <x-th>Total</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($ph_tables as $phtable)
                                <x-tr>

                                    <x-td>{{$phtable->phbracket}}</x-td>
                                    <x-td>{{$phtable->phfrom}}</x-td>
                                    <x-td>{{$phtable->phto}}</x-td>
                                    <x-td>{{$phtable->sal_base}}</x-td>
                                    <x-td>{{$phtable->personal}}</x-td>
                                    <x-td>{{$phtable->employer}}</x-td>
                                    <x-td>{{$phtable->total}}</x-td>
                                    <x-td>
                                        <a href="{{route('phtables.edit', [$phtable->phiccode])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#destroy{{$phtable->phiccode}}">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <form action="{{route('phtables.destroy', [$phtable->phiccode])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="destroy{{$phtable->phiccode}}">
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
        $title = "PHIC Contributions";
        $columns = "0,1,2,3,4,5,6";
        $target = null;
        $orientation = "portrait";
        $pageSize = "LEGAL";
    @endphp
    <x-datatable :title="$title" :columns="$columns" :target="$target" :orientation="$orientation" :pageSize="$pageSize"></x-datatable>
@endsection


