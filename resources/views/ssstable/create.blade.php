@extends('layouts.master')


@section('page_title')
    SSS Contribution Module
@endsection

@section('header')
    <x-navbar></x-navbar>
    <x-sidebar></x-sidebar>
@endsection


@section('main')
    <div class="row">
        <div class="col-lg-12">
            <x-alert></x-alert>
            <div class="card mt-3">
                <div class="card-header">
                    Create SSS Contribution
                </div>
                <div class="card-body">
                    <form action="{{route('ssstables.store')}}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-4 my-2">
                                <x-label>Bracket</x-label>
                                <x-input-number value="0" name="bracket"></x-input-number>
                                <x-validation name="bracket"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>From</x-label>
                                <x-input-number value="0" name="rangel"></x-input-number>
                                <x-validation name="rangel"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>To</x-label>
                                <x-input-number value="0" name="rangeh"></x-input-number>
                                <x-validation name="rangeh"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Sal. Credit</x-label>
                                <x-input-number value="0" name="salcredit"></x-input-number>
                                <x-validation name="salcredit"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Co SSS</x-label>
                                <x-input-number value="0" name="cosss"></x-input-number>
                                <x-validation name="cosss"></x-validation>
                            </div>


                            <div class="col-4 my-2">
                                <x-label>Co MCR</x-label>
                                <x-input-number value="0" name="comcr"></x-input-number>
                                <x-validation name="comcr"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Co EC</x-label>
                                <x-input-number value="0" name="coec"></x-input-number>
                                <x-validation name="coec"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>EMP SSS</x-label>
                                <x-input-number value="0" name="empsss"></x-input-number>
                                <x-validation name="empsss"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>EMP MCR</x-label>
                                <x-input-number value="0" name="empmcr"></x-input-number>
                                <x-validation name="empmcr"></x-validation>
                            </div>

                            <div class="col-12 my-2">
                                <x-btn>Save</x-btn>
                                <a class="float-end" href="{{route('ssstables.index')}}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection



