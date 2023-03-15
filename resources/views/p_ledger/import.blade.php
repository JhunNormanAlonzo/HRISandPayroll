@extends('layouts.master')

@section('page_title')
    Import Excel to Ledger Deduction / Wages
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
                    <h5>File to import</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('p_ledger.import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Browse your computer</x-label>
                                <x-input-file name="file"></x-input-file>
                                <x-validation name="file"></x-validation>
                            </div>
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


