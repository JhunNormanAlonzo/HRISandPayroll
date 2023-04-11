@extends('layouts.master')

@section('page_title')
    Payroll Summary
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
                    <h5>List</h5>
                </div>
                <div class="card-body">
                    <x-table>
                        <x-thead>
                            <x-th>Name</x-th>
                            @foreach($refs as $ref)
                             <x-th>{{$ref}}</x-th>
                            @endforeach
                        </x-thead>
                        <x-tbody>
                            @foreach($emp_ctrls as $ctrl)
                                <x-tr>
                                    <x-td>{{App\Models\Employee::where('emp_ctrl', $ctrl)->pluck('emp_name')->first()}}</x-td>
                                    @foreach($refs as $ref)
                                            <x-td>
                                                @foreach(App\Models\Employee::where('emp_ctrl', $ctrl)->first()->p_ledgers()->where('period', $period)->get() as $led)
                                                    @if($ref == App\Models\WdRef::where('wd_id', $led->wd_id)->pluck('wd_desc')->first())
                                                       {{$led->amount}}
                                                    @endif
                                                @endforeach
                                            </x-td>
                                    @endforeach
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
        $title = " Isabela Electric Cooperative.  Payroll Summary";
        $columns = "0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25";
        $target = null;
        $orientation = "landscape";
        $pageSize = "LEGAL";
    @endphp
    <x-datatable :title="$title" :columns="$columns" :target="$target" :orientation="$orientation" :pageSize="$pageSize"></x-datatable>
@endsection


