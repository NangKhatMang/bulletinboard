@extends('layouts.layout')

@section('content')
<div id="postEdit">
    <!-- page title -->
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Post Update</h3>
        </div>
    </div>
    <!-- post Edit form -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="/post/{{$post_detail->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control"
                        value="{{old('title', $post_detail->title)}}">
                    @if ($errors->has('title'))    
                        <label class="text-danger mt-2 mb-0">{{ $errors->first('title') }}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="desc" class="">Description</label>
                    <textarea name="desc" id="desc" class="form-control">{{old('desc', $post_detail->description)}}</textarea>
                    @if ($errors->has('desc'))
                        <label class="text-danger mt-2 mb-0">{{ $errors->first('desc') }}</label>
                    @endif
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
    </div>
</div>
@endsection
