@extends('layouts.app')

@section('content')
<div id="addPost">
    <form action="/confirmPost" method="GET">
        <div class="formgroup clearFix">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>
        <div class="formgroup clearFix">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc"></textarea>
        </div>
        <div class="confirm_formgroup">
            <button type="submit">Confirm</button>
            <button type="reset" class="clear">Clear</button>
        </div><!-- /.formgroup -->
    </form>
</div><!-- /.addPost -->
@endsection
