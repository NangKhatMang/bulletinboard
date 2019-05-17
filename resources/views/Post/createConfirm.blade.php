@extends('layouts.app')

@section('content')
<div id="confirmPost">
    <form action="/createPost">
        <div class="formgroup clearFix">
            <label>Title</label><label>Post1</label>
        </div>
        <div class="formgroup clearFix">
            <label>Description</label><label>Description</label>
        </div>
        <div class="confirm_formgroup clearFix">
            <button type="submit">Add</button>
            <button class="cancel">Cancel</button>
        </div><!-- /.formgroup -->

    </form>
</div><!-- /.confirmPost -->
@endsection
