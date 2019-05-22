@extends('layouts.app')

@section('content')
<div id="postEdit">

    <form action="/postEditConfirm" method="GET">
        <div class="form-group row">
            <label for="title" class="col-md-2">Title</label>
            <input type="text" id="title" name="title" class="form-control col-md-4" value="Post 1">
        </div>
        <div class="form-group row">
            <label for="desc" class="col-md-2">Description</label>
            <textarea name="desc" id="desc" class="form-control col-md-4">Description for Post 1</textarea>
        </div>
        <div class="form-group row">
            <label for="status" class="col-md-2 form-check-label">Status</label>
            <input type="checkbox" id="status" class="col-md-4 form-check-input">
        </div>
        <div class="form-group row">
            <div class="col-md-6 row">
                <button type="submit" class="btn btn-primary  mr-4 ml-auto">Confirm</button>
                <button type="reset" class="btn btn-white  mr-auto">Clear</button>
            </div>
        </div>
    </form>
</div><!-- /.addPost -->
@endsection
