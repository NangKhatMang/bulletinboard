@extends('layouts.layout')

@section('content')
<div id="userProfile">
    <!-- page title -->
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>User Profile</h3>
        </div>
    </div>
    <!-- show user profile -->
    <div class="row">
        <div class="col-md-8  mx-auto">
                <div class="text-center mb-4">
                    <img width="100px" height="80px" alt="User-profile" class="img-thumbnail"
                        src="{{$user_profile->profile}}">
                </div>
            </div>
        <div class="col-md-8 mx-auto">
            <form action="/user/{{$user_profile->id}}" method="GET">
                 <div class="form-group">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Edit Profile</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Name</label>
                    <label class="border border-dark p-2 col-md-6">{{$user_profile->name}}</label>
                    <input type="hidden" name="name" value="{{$user_profile->name}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Email Address</label>
                    <label class="border border-dark p-2 col-md-6">{{$user_profile->email}}</label>
                    <input type="hidden" name="email" value="{{$user_profile->email}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Password</label>
                    <label class="border border-dark col-md-6">********</label>
                    <input type="hidden" name="password" value="password">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Authority</label>
                    <label class="border border-dark p-2 col-md-6">
                        @if($user_profile->type == '0')Admin @else User @endif</label>
                    <input type="hidden" name="type" value="{{$user_profile->type}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Phone</label>
                    <label class="border border-dark p-2 col-md-6">{{$user_profile->phone}}</label>
                    <input type="hidden" name="phone" value="{{$user_profile->phone}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Date of Birth</label>
                    <label class="border border-dark p-2 col-md-6">{{$user_profile->dob}}</label>
                    <input type="hidden" name="dob" value="{{$user_profile->dob}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Address</label>
                    <label class="border border-dark p-3 col-md-6">{{$user_profile->address}}</label>
                    <input type="hidden" name="address" value="{{$user_profile->address}}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
