@extends('layouts.app')

@section('content')
<div id="postEditConfirm">

    <form action="/postList" method="GET">
        <div class="form-group row">
            <label for="title" class="col-md-2">Title</label>
            <label class="col-md-4 border border-dark">Post1</label>
        </div>
        <div class="form-group row">
            <label for="desc" class="col-md-2">Description</label>
            <label class="col-md-4 border border-dark">Update description for Post 1</label>
        </div>
        <div class="form-group row">
            <label for="status" class="col-md-2 form-check-label">Status</label>
            <input type="checkbox" id="status" class="col-md-4 form-check-input">
        </div>
        <div class="form-group row">
            <div class="col-md-6 row">
                <button type="submit" class="btn btn-primary  mr-4 ml-auto">Update</button>
                <a href="/postEdit" class="btn btn-white mr-auto">Cancel</a>
            </div>
        </div>
    </form>
</div><!-- /#postConfirm -->
@endsection
"