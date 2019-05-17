@extends('layouts.app')

@section('content')
<div id="editPost">
    <form action="/update" method="GET">
        <div class="formgroup clearFix">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="Post 1">
        </div>
        <div class="formgroup clearFix">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc">Description for Post 1</textarea>
        </div>
        <div class="formgroup clearFix">
            <label for="status">Status</label>
            <input type="checkbox" id="status" name="status">
        </div>
        <div class="confirm_formgroup">
            <button type="submit">Confirm</button>
            <button type="reset" class="clear">Clear</button>
        </div><!-- /.formgroup -->
    </form>
</div><!-- /.addPost -->
@endsection
