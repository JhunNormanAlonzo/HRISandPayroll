@extends('layouts.master')

@section('page_title')
    Department
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
                    <h5>List of Departments</h5>
                    <a href="{{route('departments.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Create Department</a>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th>Code</x-th>
                            <x-th>Deaprtment</x-th>
                            <x-th>Edit</x-th>
                            <x-th>Delete</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($departments as $dep)
                                <x-tr>
                                    <x-td>{{$dep->dept_code}}</x-td>
                                    <x-td>{{$dep->dept_desc}}</x-td>
                                    <x-td>
                                        <a href="{{route('departments.edit', [$dep->emp_dept])}}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </x-td>
                                    <x-td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#destroy{{$dep->emp_dept}}">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <form action="{{route('departments.destroy', [$dep->emp_dept])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="destroy{{$dep->emp_dept}}">
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
        $title = "Departments";
        $columns = "0,1";
        $target = null;
        $orientation = "portrait";
        $pageSize = "LEGAL";
    @endphp
    <x-datatable :title="$title" :columns="$columns" :target="$target" :orientation="$orientation" :pageSize="$pageSize"></x-datatable>
@endsection


