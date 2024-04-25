@if(!empty(session('success')))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if(!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

@if(!empty(session('payment-error')))
    <div class="alert alert-success" role="alert">
        {{session('payment-error')}}
    </div>
@endif

@if(!empty(session('info')))
    <div class="alert alert-info" role="alert">
        {{session('info')}}
    </div>
@endif

@if(!empty(session('light')))
    <div class="alert alert-success" role="alert">
        {{session('ligh')}}
    </div>
@endif

@if(!empty(session('secondary')))
    <div class="alert alert-secondary" role="alert">
        {{session('secondary')}}
    </div>
@endif