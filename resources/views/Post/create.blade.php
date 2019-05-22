@extends('layouts.app')

@section('content')
<div id="postAdd">
    <form action="/postConfirm" method="GET">
        <div class="form-group row">
            <label for="title" class="col-md-2">Title</label>
            <input type="text" id="title" name="title" class="form-control col-md-4">
        </div>
        <div class="form-group row">
            <label for="desc" class="col-md-2">Description</label>
            <textarea name="desc" id="desc" class="form-control col-md-4"></textarea>
        </div>
        <div class="form-group row">
            <div class="col-md-6 row">
                <button type="submit" class="btn btn-primary  mr-4 ml-auto">Confirm</button>
                <button type="reset" class="btn btn-white  mr-auto">Clear</button>
            </div>
        </div>
    </form>
</div><!-- /#postAdd -->
@endsection
