@extends('layouts.layout')

@section('content')
<div id="postConfirm">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Post Confirm</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8">
            <form action="/postList" method="GET">
                <div class="form-group">
                    <label>Title</label>
                    <label class="border border-dark col">Post1</label>
                </div>
                <div class="form-group">
                    <label class="">Description</label>
                    <label class="border border-dark col">Description</label>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Add</button>
                        <a href="/postAdd" class="btn btn-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div><!-- /#postConfirm -->
@endsection
