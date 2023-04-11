@extends('layouts.master')


@section('page_title')
    Deduction Module
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
                    Deduction Entry
                </div>
                <div class="card-body">
                    <form id="my-form" action="{{route('ledger_deductions.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Period</x-label>
                                <x-datalist name="period" :data="$periods" column="pname" id="input"></x-datalist>
                                <x-validation name="period"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Employee</x-label>
                                <x-datalist name="emp_ctrl" :data="$employees" column="emp_name" id="input"></x-datalist>
                                <x-validation name="emp_ctrl"></x-validation>
                            </div>


                            <div class="col-12">
                                <div id="inputs-container" class="row">
                                    <div id="child" class="col-4">
                                        <div class="row card">
                                            <div class="col-12 my-2">
                                                <x-label>Deduction</x-label>
                                                <x-datalist name="deduction[]" :data="$deductions" column="wd_desc" class="input-ded"></x-datalist>
                                                <x-validation name="deduction[]"></x-validation>
                                            </div>

                                            <div class="col-12 my-2">
                                                <x-label>Amount</x-label>
                                                <x-input-number name="amount[]" class="input-ded"></x-input-number>
                                                <x-validation name="amount[]"></x-validation>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>






                            <div class="col-12 my-2">
                                <button class="btn btn-info btn-sm" type="button" id="add-input-btn">Add Deduction</button>
                                <button class="btn btn-danger btn-sm" type="button" id="minus-btn">Remove Deduction</button>

                                <x-btn>Save Deduction</x-btn>
                                <a class="float-end" href="{{route('locations.index')}}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        // JS code
        const form = document.querySelector('#my-form');
        const inputsContainer = document.querySelector('#inputs-container');
        const addInputBtn = document.querySelector('#add-input-btn');

        addInputBtn.addEventListener('click', function(event) {
            event.preventDefault(); // prevent form submission
            const inputContainer = document.createElement('div');
            inputContainer.id = 'child';
            inputContainer.classList.add('col-4');
            inputContainer.innerHTML = `

               <div class="row card">
                   <div class="col-12 my-2">
                       <x-label>Deduction</x-label>
                       <x-datalist name="deduction[]" :data="$deductions" column="wd_desc" class="input-ded"></x-datalist>
                       <x-validation name="deduction[]"></x-validation>
                   </div>

                   <div class="col-12 my-2">
                       <x-label>Amount</x-label>
                       <x-input-number name="amount[]" class="input-ded"></x-input-number>
                       <x-validation name="amount[]"></x-validation>
                   </div>
               </div>


        `;
            inputsContainer.appendChild(inputContainer);
        });





        function removeInput() {
            const inputsContainer = document.getElementById('inputs-container');
            if (inputsContainer.children.length > 1) {
                const lastInput = inputsContainer.lastElementChild;
                inputsContainer.removeChild(lastInput);
            }
        }

        const myContainer = document.getElementById('inputs-container');
        myContainer.addEventListener('dblclick', function(event) {
            if (event.target.tagName.toLowerCase() === 'input') {
                event.target.value = '';
                event.target.select();
            }
        });

        const minusBtn = document.getElementById('minus-btn');
        minusBtn.addEventListener('click', removeInput);

    </script>
@endsection



