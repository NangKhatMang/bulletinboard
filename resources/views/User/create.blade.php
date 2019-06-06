@extends('layouts.layout')

@section('content')
<div id="usercreate">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Create New User</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="/user/create" method="Post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-md-4">Name</label>
                    <input type="text" id="name" name="user_name" value="{{old('user_name')}}" class="form-control col-md-6">
                    @if ($errors->has('user_name'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('user_name') }}</div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4">Email Address</label>
                    <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control col-md-6">
                    @if ($errors->has('email'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4">Password</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" class="form-control col-md-6">
                    @if ($errors->has('password'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control col-md-6">
                    @if ($errors->has('password_confirmation'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="type" class="col-md-4">Type</label>
                    <select name="type" id="type" class="col-md-6">
                        <option value="" disabled selected>-- Choose Authority --</option>
                        <option value="0"
                            @if (old('type') == '0' ) {{"selected"}} @endif>Admin</option>
                        <option value="1"
                            @if (old('type') == '1' ) {{"selected"}} @endif>User</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-md-4">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control col-md-6">
                    @if ($errors->has('phone'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="dob" class="col-md-4">Date of Birth</label>
                    <input type="date" id="dob" name="dob" value="{{old('dob')}}" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4">Address</label>
                    <textarea name="address" id="address" class="form-control col-md-6">{{old('address')}}</textarea>
                </div>
                <div class="form-group row">
                    <label for="profile" class="col-md-4">Profile</label>
                    <input type="file" id="profile" name="profileImg" value="{{old('profileImg')}}" class="form-control col-md-6">
                    @if ($errors->has('profile'))    
                        <div class="col-md-4"></div>
                        <div class="col-md-6 mt-1 text-danger">{{ $errors->first('profile') }}</div>
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
</div><!-- /#usercreate -->
@endsection