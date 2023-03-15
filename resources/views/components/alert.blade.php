@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session('message') }}
    </div>
@endif
