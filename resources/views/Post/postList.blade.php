@extends('layouts.layout')

@section('content')
<div id="postList">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            @if(Session::has('success-changPwd'))
                <div class="alert alert-dismissible alert-success  alertmessage">
                    <strong>Success</strong>
                    <p class="alert {{Session::get('alert-class','alert-warning')}} ">{{ Session::get('success-changPwd')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div><!-- success password change alert -->
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            @if(!empty($success))
                <div class="alert alert-dismissible alert-success  alertmessage">
                    <strong>Success</strong>
                    <p class="alert {{Session::get('alert-class','alert-success')}} ">{{$success}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div><!-- success alert -->
    </div>
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <h3>Post List</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="/posts/search" method="GET" class="form-inline">
            @csrf
            <div class="form-group mb-2">
                <input type="text" name="search" value="{{session('searchKeyword')}}" class="form-control mb-4 mr-3" placeholder="Search...">
                <button type="submit" class="btn btn-primary mb-4 mr-3">Search</button>
                <a href="/post/create" class="btn btn-primary mb-4 mr-3">Add</a>
                <a href="/csv/upload" class="btn btn-primary mb-4 mr-3">Upload</a>
                <a href="/download" class="btn btn-primary mb-4 mr-3">Download</a>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-responsive-md table-striped table-bordered text-center col-md-9 mx-auto">
            <thead class="thead-dark">
                <th>No.</th>
                <th>Post Title</th>
                <th>Post Description</th>
                <th>Posted User</th>
                <th>Posted Date</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                @foreach($posts as $key => $post)
                <tr>
                    <td>{{ $posts->firstItem() + $key }}</td>
                    <td><a href="">{{$post->title}}</a></td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td><a href="/post/{{$post->id}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="/post/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <ul class="pagination col-md-12 justify-content-center">
            {{$posts->links()}}
        </ul>
    </div>
</div><!-- /#postList -->
@endsection