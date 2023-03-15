

<div class="col-8 my-2">
    <div class="row">
        <div class="col-6 my-2">
            <x-label>From</x-label>
            <x-input-datetime name="lv_from" id="startDate"  wire:model="startDate" wire:change="calculateLeaveDays" ></x-input-datetime>
            <x-validation name="from"></x-validation>
        </div>

        <div class="col-6 my-2">
            <x-label>To</x-label>
            <x-input-datetime name="lv_to" id="endDate"  wire:model="endDate" wire:change="calculateLeaveDays" wire:ignore></x-input-datetime>
            <x-validation name="to"></x-validation>
        </div>

        <div class="col-6 my-2">
            <x-label>Leave Hours</x-label>
            <x-input-text type="number" name="lv_qty" value="{{$totalHours}}"></x-input-text>
            <x-validation name="number"></x-validation>
        </div>

        <div class="col-6 my-2">
            <x-label>Leave Days</x-label>
            <x-input-text type="number" name="lv_days" value="{{$totalDays}}"></x-input-text>
            <x-validation name="number"></x-validation>
        </div>
    </div>
</div>


