@extends('layouts.layout')

@section('content')
<div id="postAdd">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Update User</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8 ">
            <form action="/userEditConfirm" method="GET">
                <div class="form-group row">
                    <label for="title" class="col-md-4">Name</label>
                    <input type="text" id="title" name="username" value="User 1" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4">Email Address</label>
                    <input type="text" id="email" name="email" value="user1@gmail.com" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="authority" class="col-md-4">Authority</label>
                    <select name="authority" id="authority" class="col-md-6">
                        <option value=""></option>
                        <option value="admin">Admin</option>
                        <option value="user" selected>User</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-md-4">Phone</label>
                    <input type="text" id="phone" name="phone" value="09456325487" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="dob" class="col-md-4">Date of Birth</label>
                    <input type="date" id="dob" name="dob" value="5-5-1995" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4">Address</label>
                    <textarea name="address" id="address" class="form-control col-md-6">Yangon</textarea>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4">Password</label>
                    <a href="/changePassword" class="btn btn-primary form-control col-md-3">Change Password</a>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Confirm</button>
                        <button type="reset" class="btn btn-white">Clear</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
        
</div><!-- /#postAdd -->
@endsection
