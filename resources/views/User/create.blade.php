@extends('layouts.layout')

@section('content')
<div id="postAdd">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Create New User</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="/userConfirm" method="GET">
                <div class="form-group row">
                    <label for="title" class="col-md-4">Name</label>
                    <input type="text" id="title" name="username" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4">Email Address</label>
                    <input type="text" id="email" name="email" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4">Password</label>
                    <input type="password" id="password" name="password" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="confirm-password" class="col-md-4">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="authority" class="col-md-4">Authority</label>
                    <select name="authority" id="authority" class="col-md-6">
                        <option value=""></option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-md-4">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="dob" class="col-md-4">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4">Address</label>
                    <textarea name="address" id="address" class="form-control col-md-6"></textarea>
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
</div><!-- /#postAdd -->
@endsection