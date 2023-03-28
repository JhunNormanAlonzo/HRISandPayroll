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
                                <x-btn id="import-button" >Save</x-btn>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-2">
                        <div class="col-12">
{{--                            display: none;--}}
                            <div id="spinner"  class=" text-center rounded p-5" style="display: none; background: linear-gradient(to left, rgba(0,89,224,0.66), rgba(0,0,0,0.56)) " >

                                <span class="spinner-border text-warning ml-5" role="status"></span>
                                <h5 class="mx-5 text-white">
                                Importing Madam...

                                </h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $('#import-button').click(function(){
                $('#spinner').show();
                $.ajax({
                    url: '/import_ledger',
                    success: function(response){
                        $('#spinner').hide();
                    },
                    error: function(response){
                        $('#spinner').hide();
                    }
                });
            });
        });
    </script>

@endsection
