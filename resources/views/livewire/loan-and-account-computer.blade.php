<div class="row">
    <div class="col-12 my-2">
        <x-label>Amount Balance</x-label>
        <x-input-number name="amount" wire:model="balance"  wire:change="computeAmortization" wire:ignore></x-input-number>
        <x-validation name="amount"></x-validation>
    </div>

    <div class="col-12 my-2">
        <x-label>Terms</x-label>
        <x-input-number name="split" wire:model="split" wire:change="computeAmortization" wire:ignore></x-input-number>
        <x-validation name="split"></x-validation>
    </div>


    <div class="col-12 my-2">
        <x-label>Current Term</x-label>
        <x-input-number name="split_val" ></x-input-number>
        <x-validation name="split_val"></x-validation>
    </div>

    <div class="col-12 my-2">
        <x-label>Pay Amount</x-label>
        <x-input-number name="pay_amt" value="{{$amortization}}"></x-input-number>
        <x-validation name="pay_amt"></x-validation>
    </div>

    <div class="col-12 my-2">
        <x-label>Balance</x-label>
        <x-input-number name="balance" value="{{$balance}}"></x-input-number>
        <x-validation name="balance"></x-validation>
    </div>

    <div class="col-12 my-2">
        <x-input-check name="isactive" value="1"></x-input-check>
        <label class="text-sm text-muted">Is Active</label>
    </div>

</div>
