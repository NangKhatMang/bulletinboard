@extends('layouts.layout')

@section('content')
<div id="changePassword">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Change Password</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-7">
            <form action="/userList" method="GET">
                <div class="form-group row">
                    <label for="old-pwd" class="col-4">Old password</label>
                    <input type="password" id="old-pwd" name="old-pwd" placeholder="Enter your old password" class="form-control col-8">
                </div>
                <div class="form-group row">
                    <label for="new-pwd" class="col-md-4">New Password</label>
                    <input type="password" id="new-pwd" name="new-pwd" placeholder="Enter new password" class="form-control col-md-6">
                </div>
                <div class="form-group row">
                    <label for="confirm-new-pwd" class="col-md-4">Confirm New Password</label>
                    <input type="password" id="confirm-new-pwd" name="confirm-new-pwd" placeholder="Confirm your new password" class="form-control col-md-6">
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
</div><!-- /#changePassword -->
@endsection
