@extends('layouts.layout')

@section('content')
<div id="userEditConfirm">
    <!-- page title -->
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>User Update Confirmation</h3>
        </div>
    </div>
    <!-- user update confirmation -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="col-md-8  mx-auto">
                <div class="text-center mb-4">
                    <img width="100px" height="80px" alt="User-profile" class="img-thumbnail"
                        src="@if($user->profile)/img/tempProfile/{{$user->profile}} @else {{$old_profile}} @endif">
                </div>
            </div>
            <form action="/user/{{$user_id}}" method="POST">
                @csrf
                <input type="hidden" name="oldProfile" value="{{$old_profile}}">
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
                    @if ($user->type == 0) <label class="border border-dark p-2 col-md-6">Admin</label>
                        @else <label class="border border-dark p-2 col-md-6">User</label>
                    @endif
                    <input type="hidden" name="type" value="{{$user->type}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Phone</label>
                    <label class="border border-dark p-2 col-md-6">{{$user->phone}}</label>
                    <input type="hidden" name="phone" value="{{$user->phone}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Date of Birth</label>
                    <label class="border border-dark p-2 col-md-6">{{date('d-m-Y', strtotime($user->dob))}}</label>
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
                        <a href="/user/{{$user_id}}" class="btn btn-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
