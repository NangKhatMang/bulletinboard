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
        <div class="col-md-8 mx-auto">
            <form action="/post/create" method="POST">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <label class="border border-dark col">{{$title}}</label>
                    <input type="hidden" name="title" value="{{$title}}">
                </div>
                <div class="form-group">
                    <label class="">Description</label>
                    <label class="border border-dark col">{{$desc}}</label>
                    <input type="hidden" name="desc" value="{{$desc}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  mr-4">Add</button>
                        <a href="/post/cancel" class="btn btn-white">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- /#postConfirm -->
@endsection
