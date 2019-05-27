@extends('layouts.layout')

@section('content')
<div id="userProfile">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>User Profile</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8 ">
            <form action="/userEdit" method="GET">
                 <div class="form-group">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Name</label>
                    <label class="border border-dark col-md-6">User 1</label>
                    <input type="hidden" name="username" value="User 1">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Email Address</label>
                    <label class="border border-dark col-md-6">user1@gmail.com</label>
                    <input type="hidden" name="email" value="user1@gmail.com">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Password</label>
                    <label class="border border-dark col-md-6">********</label>
                    <input type="hidden" name="password" value="password">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Authority</label>
                    <label class="border border-dark col-md-6">Admin</label>
                    <input type="hidden" name="authority" value="admin">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Phone</label>
                    <label class="border border-dark col-md-6">09456598759</label>
                    <input type="hidden" name="phone" value="09456598759">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Date of Birth</label>
                    <label class="border border-dark col-md-6">5/5/1995</label>
                    <input type="hidden" name="dob" value="5/5/1995">
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Address</label>
                    <label class="border border-dark col-md-6">Yangon</label>
                    <input type="hidden" name="address" value="Yangon">
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
        
</div><!-- /#userProfile -->
@endsection
