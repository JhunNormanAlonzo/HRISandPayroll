@extends('layouts.master')


@section('page_title')
    Wage / Deduction Module
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
                    Wage Deduction Entry
                </div>
                <div class="card-body">
                    <form id="my-form" action="{{route('ledger_wds.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 my-2">
                                <x-label>Period</x-label>
                                <x-datalist name="period" value="{{$req_period}}" :data="$wds" column="pname" id="input"></x-datalist>
                                <x-validation name="period"></x-validation>
                            </div>

                            <div class="col-4 my-2">
                                <x-label>Employee</x-label>
                                <x-datalist name="emp_ctrl" value="{{$emp_name}}" :data="$employees" column="emp_name" id="input"></x-datalist>
                                <x-validation name="emp_ctrl"></x-validation>
                            </div>


                            <div class="col-12">
                                <div id="inputs-container" class="row">
                                    @foreach($wds as $w)

                                    <div id="child" class="col-4 wholeDiv">
                                        <div class="row card">
                                            <div class="col-12 my-2">
                                                <button type="button" class="btn btn-sm btn-outline-secondary my-2 mx-2 rounded-circle float-end remDiv"><i class="bi bi-x"></i></button>
                                                <x-datalist name="wage_deduction[]" :data="$wage_deductions" value="{{$wage_deductions->where('wd_id', $w->wd_id)->pluck('wd_desc')->first()}}" column="wd_desc" class="input-wg"></x-datalist>
                                                <x-validation name="wage_deduction[]"></x-validation>
                                            </div>

                                            <div class="col-12 my-2">
                                                <x-input-number name="amount[]" value="{{$w->amount}}" class="input-wg"></x-input-number>
                                                <x-validation name="amount[]"></x-validation>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>






                            <div class="col-12 my-2">
                                <button class="btn btn-info btn-sm" type="button" id="add-input-btn">Add wage deduction</button>
                                <button class="btn btn-danger btn-sm" type="button" id="minus-btn">Remove wage deduction</button>

                                <x-btn>Save wage deduction</x-btn>
                                <a class="float-end" href="{{route('ledger_wds.index')}}">Back</a>
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
            inputContainer.classList.add('wholeDiv');
            inputContainer.innerHTML = `

                <div class="row card">
                    <div class="col-12 my-2">
                        <button type="button" class="btn btn-sm btn-secondary my-2 mx-2 rounded float-end remDiv">x</button>
                        <x-datalist name="wage_deduction[]" :data="$wage_deductions" column="wd_desc" class="input-wg"></x-datalist>
                        <x-validation name="wage_deduction[]"></x-validation>
                    </div>

                    <div class="col-12 my-2">
                        <x-input-number name="amount[]"  class="input-wg"></x-input-number>
                        <x-validation name="amount[]"></x-validation>
                    </div>
                </div>


        `;
            inputsContainer.appendChild(inputContainer);

            const removeButton = inputContainer.querySelector('.remDiv');
            removeButton.addEventListener('click', function() {
                const card = this.closest('.wholeDiv');
                card.remove();
            });
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


        var removeButtons = document.querySelectorAll('.remDiv');
        removeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var card = this.closest('.wholeDiv');
                card.remove();
            });
        });

    </script>
@endsection



