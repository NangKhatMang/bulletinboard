@extends('layouts.layout')

@section('content')
<div id="changePassword">
    <!-- page title -->
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Change Password</h3>
        </div>
    </div>
    <!-- incorrect password alert-->
    <div class="row">
        <div class="col-md-7 mx-auto">
            @if(Session::has('incorrect'))
                <div class="alert alert-dismissible alert-warning  alertmessage text-danger">
                    <strong>Incorrect Password!</strong>
                    <p class="alert {{Session::get('alert-class', 'alert-danger')}} ">{{ Session::get('incorrect')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <!-- password change form -->
    <div class="row">
        <div class="col-md-7 mx-auto">
            <form action="/changePwd/{{$user_id}}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="old_password" class="col-md-4">Enter old password</label>
                    <input type="password" id="old_password" name="old_password" value="{{old('old_password')}}" class="form-control col-md-6">
                    @if ($errors->has('old_password'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('old_password') }}</div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4">Enter new password</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" class="form-control col-md-6">
                    @if ($errors->has('password'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4">Confirm new password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control col-md-6">
                    @if ($errors->has('password_confirmation'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Confirm</button>
                        <button type="reset" class="btn btn-white">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
