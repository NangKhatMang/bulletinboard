@extends('layouts.layout')

@section('content')
<div id="postEditConfirm">

    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Post Confirm</h3>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8">
            <form action="/post/{{$postId}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <label class="border border-dark col">{{$title}}</label>
                    <input type="hidden" name="title" value="{{$title}}">
                </div>
                <div class="form-group">
                    <label for="desc" class="">Description</label>
                    <label class="border border-dark col">{{$desc}}</label>
                    <input type="hidden" name="desc" value="{{$desc}}">
                </div>
                <div class="form-group row">
                    <label for="status" class="col-2 form-check-label">Status</label>
                    <div class="col-4">
                        <input type="checkbox" id="status" class="form-check-input">
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Update</button>
                        <a href="/post/{{$postId}}" class="btn btn-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div><!-- /#postConfirm -->
@endsection