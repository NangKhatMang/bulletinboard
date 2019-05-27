@extends('layouts.layout')

@section('content')
<div id="login">
    <div class="row">
        <div class="col-md"></div>
        <form action="/login" method="GET" class="col-md-8 border border-primary">
            <div class="row bg-primary mb-5">
                <div class="col my-2"><h2 class="text-center text-white">Login Form</h2></div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4">Email</label>
                <input type="text" name="email" id="email" class="form-control col-md-6">
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4">Password</label>
                <input type="password" name="password" id="password" class="form-control col-md-6">
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="check" class="form-check-label">Remember Me</label>
                </div>
                <div class="col-md-6 form-check">
                    <input type="checkbox" id="check" class="form-check-input">
                </div>
            </div>
            <div class="form-group row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
        <div class="col-md"></div>
    </div>
</div><!-- /#login -->
@endsection
