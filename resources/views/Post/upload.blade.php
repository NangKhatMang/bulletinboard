@extends('layouts.layout')

@section('content')
<div id="postAdd">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Upload CSV File</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="/csv/upload" method="POST" enctype="multipart/form-data" class="border border-dark p-5">
                @csrf
                <div class="form-group">
                    <label for="file" class="h4 mb-3">Select a file to upload</label>
                    <input type="file" id="file" name="file" class="form-control-file border border-dark">
                    @if($errors->has('file'))
                        <label class="text-danger mt-2 mb-0">{{ $errors->first('file') }}</label>
                    @endif
                    @if(Session::has('invalid'))
                        <label class="text-danger mt-2 mb-0">{{ Session::get('invalid') }}</label>
                    @endif
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-2">Import File</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- /#postAdd -->

@endsection
