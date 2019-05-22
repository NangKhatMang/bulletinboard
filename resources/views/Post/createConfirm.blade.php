@extends('layouts.app')

@section('content')
<div id="postConfirm">

    <form action="/postList" method="GET">
        <div class="form-group row">
            <label class="col-md-2">Title</label>
            <label class="col-md-4 border border-dark">Post1</label>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Description</label>
            <label class="col-md-4 border border-dark">Description</label>
        </div>
        <div class="form-group row">
            <div class="col-md-6 row">
                <button type="submit" class="btn btn-primary  mr-4 ml-auto">Add</button>
                <a href="/postAdd" class="btn btn-white mr-auto">Cancel</a>
            </div>
        </div>
    </form>
</div><!-- /#postConfirm -->
@endsection
