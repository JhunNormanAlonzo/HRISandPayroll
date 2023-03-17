@extends('layouts.master')


@section('page_title')
    PHIC Contribution Module
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
                    Create PHIC Contribution
                </div>
                <div class="card-body">
                    <form action="{{route('phtables.store')}}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-4 my-2">
                                <x-label>Bracket</x-label>
                                <x-input-number value="0" name="phbracket"></x-input-number>
                                <x-validation name="phbracket"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>From</x-label>
                                <x-input-number value="0" name="phfrom"></x-input-number>
                                <x-validation name="phfrom"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>To</x-label>
                                <x-input-number value="0" name="phto"></x-input-number>
                                <x-validation name="phto"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Sal. Base</x-label>
                                <x-input-number value="0" name="sal_base"></x-input-number>
                                <x-validation name="sal_base"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Personal</x-label>
                                <x-input-number value="0" name="personal"></x-input-number>
                                <x-validation name="personal"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Employer</x-label>
                                <x-input-number value="0" name="employer"></x-input-number>
                                <x-validation name="employer"></x-validation>
                            </div>

                            <div class="col-12 my-2">
                                <x-btn>Save</x-btn>
                                <a class="float-end" href="{{route('phtables.index')}}">Back</a>
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



