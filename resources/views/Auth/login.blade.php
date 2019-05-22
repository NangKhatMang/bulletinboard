@extends('layouts.app')

@section('content')
<div id="login">
    <h3 class="">Login Form</h3>
    
    
    <form action="/login" method="GET">
        
        <div class="form-group row">
            <label for="email" class="col-md-2">Email</label>
            <input type="text" name="email" id="email" class="form-control col-md-4">
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-2">Password</label>
            <input type="password" name="password" id="password" class="form-control col-md-4">
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <label for="check" class="form-check-label">Remember Me</label>
            </div>
            <div class="col-md-4 form-check">
                <input type="checkbox" id="check" class="form-check-input">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-4 text-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>
</div><!-- /.login -->
@endsection
