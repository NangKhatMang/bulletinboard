@extends('layouts.app')

@section('content')
<div id="postAdd">
    <h2>Upload file form</h2>
    <form action="/postList" method="GET" class="border border-dark">
        <div class="form-group mt-4 ml-4">
            <input type="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary ml-4 mb-4">Import File</button>
    </form>
</div><!-- /#postAdd -->
@endsection
