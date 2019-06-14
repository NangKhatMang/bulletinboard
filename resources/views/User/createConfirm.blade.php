@extends('layouts.layout')

@section('content')
<div id="userConfirm">
    <!-- page title -->
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Confirm User</h3>
        </div>
    </div>
    <!-- user register confirmation -->
    <div class="row">
        <div class="col-md-8  mx-auto">
            <div class="text-center mb-4">
                <img width="100px" height="80px" src="/img/tempProfile/{{$filename}}" alt="User-profile" class="img-thumbnail">
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <form action="/user/create" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="filename" value="{{$filename}}">
                <div class="form-group row">
                    <label class="col-md-4">Name</label>
                    <label class="border border-dark p-2 col-md-6">{{$name}}</label>
                    <input type="hidden" name="user_name" value="{{$name}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Email Address</label>
                    <label class="border border-dark p-2 col-md-6">{{$email}}</label>
                    <input type="hidden" name="email" value="{{$email}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Password</label>
                    <label class="border border-dark p-2 col-md-6">{{$pwd_hide}}</label>
                    <input type="hidden" name="password" value="{{$pwd}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Authority</label>
                    @if ($type == null || $type == 1) <label class="border border-dark p-2 col-md-6">User</label>
                        @else <label class="border border-dark p-2 col-md-6">Admin</label>
                    @endif
                    <input type="hidden" name="type" value="{{$type}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Phone</label>
                    <label class="border border-dark p-2 col-md-6">{{$phone}}</label>
                    <input type="hidden" name="phone" value="{{$phone}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Date of Birth</label>
                    <label class="border border-dark p-2 col-md-6">{{date('d-m-Y', strtotime($dob))}}</label>
                    <input type="hidden" name="dob" value="{{$dob}}">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Address</label>
                    <label class="border border-dark p-3 col-md-6">{{$address}}</label>
                    <input type="hidden" name="address" value="{{$address}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Create</button>
                        <a href="/user/create" class="btn btn-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
