@extends('layouts.master')

@section('page_title')
    Division
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
                    <h5>List of Division</h5>
                    <a href="{{route('divisions.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Create Division</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th>Code</x-th>
                            <x-th>Division</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($sections as $section)
                                <x-tr>
                                    <x-td>{{$section->sectioncode}}</x-td>
                                    <x-td>{{$section->sectionname}}</x-td>
                                    <x-td>
                                        <a href="{{route('divisions.edit', [$section->s_uid])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#destroy{{$section->s_uid}}">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <form action="{{route('divisions.destroy', [$section->s_uid])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="destroy{{$section->s_uid}}">
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
        $title = "Divisions";
        $columns = "0";
        $target = null;
        $orientation = "portrait";
        $pageSize = "LEGAL";
    @endphp
    <x-datatable :title="$title" :columns="$columns" :target="$target" :orientation="$orientation" :pageSize="$pageSize"></x-datatable>
@endsection


