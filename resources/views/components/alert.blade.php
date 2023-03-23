@if (Session::has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="alert alert-success" role="alert">
        {{ Session('message') }}
    </div>
@endif
