@extends('layouts.layout')

@section('content')
<div id="postEdit">

    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Post Update</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8 ">
            <form action="/postEditConfirm" method="GET">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="Post 1">
                </div>
                <div class="form-group">
                    <label for="desc" class="">Description</label>
                    <textarea name="desc" id="desc" class="form-control">Description for Post 1</textarea>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-2 form-check-label">Status</label>
                    <div class="col-4">
                        <input type="checkbox" id="status" class="form-check-input">
                    </div>
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
</div><!-- /.addPost -->
@endsection
