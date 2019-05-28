@extends('layouts.layout')

@section('content')
<div id="postAdd">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Create New Post</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="/postConfirm" method="GET">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc" class="">Description</label>
                    <textarea name="desc" id="desc" class="form-control"></textarea>
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