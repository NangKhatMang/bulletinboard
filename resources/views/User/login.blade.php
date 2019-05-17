@extends('layouts.app')

@section('content')
<div id="login">
    <form action="/login" method="GET">
        <h3 class="col-12">Login Form</h3>
        <div class="formgroup clearFix">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="formgroup clearFix">
            <label for="password">Password</label>
            <input type="text" name="password" id="password">
        </div>
        <div class="formgroup clearFix">
            <div class="form_right">
                <label><input type="checkbox" name="remember">Remember Me</label>
            </div>
        </div>
        <div class="formgroup clearFix">
            <div class="form_right btn_center">
                <button type="submit" class="login">Login</button>
            </div>
        </div>
    </form>
</div><!-- /.login -->
@endsection
