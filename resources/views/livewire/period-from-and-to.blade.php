
<div>
    <div class="col-6 my-2">
        <x-label>From</x-label>
        <x-input-date name="pfrom" id="startDate"  wire:model="startDate" wire:change="calculateLeaveDays" ></x-input-date>
        <x-validation name="pfrom"></x-validation>
    </div>

    <div class="col-6 my-2">
        <x-label>To</x-label>
        <x-input-date name="pto" id="endDate"  wire:model="endDate" wire:change="calculateLeaveDays" wire:ignore></x-input-date>
        <x-validation name="pto"></x-validation>
    </div>

    <div class="col-6 my-2">
        <x-label>PMY</x-label>
        <x-input-date name="pmy" value="{{$pmy}}"></x-input-date>
        <x-validation name="pmy"></x-validation>
    </div>


    <div class="col-6 my-2">
        <x-label>Days</x-label>
        <x-input-text type="number" name="pdays" value="{{$totalDays}}"></x-input-text>
        <x-validation name="pdays"></x-validation>
    </div>
</div>
