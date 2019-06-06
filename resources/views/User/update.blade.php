@extends('layouts.layout')

@section('content')
<div id="userEditConfirm">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>User Update Confirmation</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="col-md-8  mx-auto">
                <div class="text-center mb-4">
                    <img width="100px" height="80px" alt="User-profile" class="img-thumbnail"
                        src="@if($user->profile)/img/tempProfile/{{$user->profile}} @else {{$oldProfile}} @endif">
                </div>
            </div>
            <form action="/user/{{$userId}}" method="POST">
                @csrf
                <input type="hidden" name="oldProfile" value="{{$oldProfile}}">
                <input type="hidden" name="newProfile" value="{{$user->profile}}">
                <div class="form-group row">
                    <label class="col-md-4">Name</label>
                    <label class="border border-dark p-2 col-md-6">{{$user->name}}</label>
                    <input type="hidden" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Email Address</label>
                    <label class="border border-dark p-2 col-md-6">{{$user->email}}</label>
                    <input type="hidden" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Type</label>
                    <label class="border border-dark p-2 col-md-6">{{$user->type}}</label>
                    <input type="hidden" name="type" value="{{$user->type}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Phone</label>
                    <label class="border border-dark p-2 col-md-6">{{$user->phone}}</label>
                    <input type="hidden" name="phone" value="{{$user->phone}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Date of Birth</label>
                    <label class="border border-dark p-2 col-md-6">{{$user->dob}}</label>
                    <input type="hidden" name="dob" value="{{$user->dob}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Address</label>
                    <label class="border border-dark p-3 col-md-6">{{$user->address}}</label>
                    <input type="hidden" name="address" value="{{$user->address}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Update</button>
                        <a href="/user/{{$userId}}" class="btn btn-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- /#userEditConfirm -->
@endsection
