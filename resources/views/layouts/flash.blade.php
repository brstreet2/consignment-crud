<div class="alert alert-success" role="alert">
    You are logged in!
</div>

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {!! Session::get('success') !!}
    </div>
@endif

@if(Session::has('failed'))
    <div class="alert alert-danger" role="alert">
        {!! Session::get('failed') !!}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {!! Session::get('error') !!}
    </div>
@endif

@if($errors->all())
{{--  {{ dd($errors->all()) }}  --}}
    <div class="alert alert-warning" role="alert">
        Silakan periksa formulir dengan cermat untuk melihat kesalahan!
    </div>
@endif