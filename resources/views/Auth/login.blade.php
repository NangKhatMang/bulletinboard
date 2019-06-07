@extends('layouts.layout')

@section('content')
<div id="login">
    <div class="row">
        <form action="/user/login" method="POST" class="col-md-8 mx-auto border border-primary">
        @csrf
            <div class="row bg-primary mb-5">
                <div class="col my-2"><h2 class="text-center text-white">Login Form</h2></div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4">Email</label>
                <input type="text" name="email" id="email" class="form-control col-md-6">
                @if ($errors->has('email'))    
                    <div class="col-md-4"></div>
                    <div class="col-md-6 mt-1 text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4">Password</label>
                <input type="password" name="password" id="password" class="form-control col-md-6">
                @if ($errors->has('password'))    
                    <div class="col-md-4"></div>
                    <div class="col-md-6 mt-1 text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="check" class="form-check-label">Remember Me</label>
                </div>
                <div class="col-md-6 form-check">
                    <input type="checkbox" id="check" class="form-check-input">
                </div>
            </div>
            @if ($errors->has('incorrect'))
                <div class="form-group row">
                    <label class="col text-center text-danger">
                        {{ $errors -> first('incorrect') }} 
                    </label>
                </div>
            @endif
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- /#login -->
@endsection
