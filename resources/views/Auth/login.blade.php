@extends('layouts.layout')

@section('content')
<div id="login">
    <div class="row">
        <div class="col-md-8 mx-auto">
            @if(Session::has('incorrect'))
                <div class="alert alert-dismissible alert-warning  alertmessage">
                    <strong>Incorrect Password!</strong>
                    <p class="alert {{Session::get('alert-class','alert-danger')}} ">{{ Session::get('incorrect')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div><!-- incorrect password alert-->
    </div>
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
                <label for="check" class="col-4 form-check-label">Remember Me</label>
                <div class="col-8">
                    <input type="checkbox" id="check" class="form-check-input ml-1">
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- /#login -->
@endsection
