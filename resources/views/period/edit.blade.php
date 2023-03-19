@extends('layouts.master')


@section('page_title')
    Period Module
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
                    Create Period
                </div>
                <div class="card-body">
                    <form action="{{route('periods.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <livewire:period-from-and-to></livewire:period-from-and-to>

                            <div class="col-6 my-2">
                                <div class="row">
                                    <div class="col-3">
                                        <x-input-check name="posted" value="1"></x-input-check>
                                        <x-label>Posted</x-label>
                                    </div>

                                    <div class="col-3">
                                        <x-input-check name="closed" value="1"></x-input-check>
                                        <x-label>Closed</x-label>
                                    </div>

                                    <div class="col-3">
                                        <x-input-check name="is30th" value="1"></x-input-check>
                                        <x-label>30th</x-label>
                                    </div>

                                    <div class="col-3">
                                        <x-input-check name="logpro" value="1"></x-input-check>
                                        <x-label>LogPro</x-label>
                                    </div>

                                </div>
                            </div>


                            <div class="col-12 my-2">
                                <x-btn>Save</x-btn>
                                <a class="float-end" href="{{route('periods.index')}}">Back</a>
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



