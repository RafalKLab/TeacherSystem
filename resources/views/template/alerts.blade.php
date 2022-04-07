@if (Session::has('info'))
    <div class="alert alert-primary mt-2" role="alert">
        {{Session::get('info')}}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success mt-2" role="alert">
        {{Session::get('success')}}
    </div>
@endif

@if (Session::has('incorrect'))
    <div class="alert alert-danger mt-2" role="alert">
        {{Session::get('incorrect')}}
    </div>
@endif
