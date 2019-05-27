@extends('layouts.layout')

@section('content')
<div id="postAdd">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Upload</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8 ">
            <form action="/postList" method="GET" class="border border-dark p-5">
                <div class="form-group">
                    <input type="file" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Import File</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div><!-- /#postAdd -->
@endsection
