@extends('layouts.layout')

@section('content')
<div id="postAdd">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Confirm User</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8 ">
            <form action="/userList" method="GET">
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
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Insert</button>
                        <a href="/userAdd" class="btn btn-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
        
</div><!-- /#postAdd -->
@endsection
