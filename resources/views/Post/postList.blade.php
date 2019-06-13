@extends('layouts.layout')

@section('content')
<div id="postList">
    <!-- success password change alert -->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            @if(Session::has('success-changPwd'))
                <div class="alert alert-dismissible alert-success  alertmessage">
                    <strong>Success</strong>
                    <p class="alert {{Session::get('alert-class', 'alert-warning')}} ">{{ Session::get('success-changPwd')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <!-- success alert -->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            @if(!empty($success))
                <div class="alert alert-dismissible alert-success  alertmessage">
                    <strong>Success</strong>
                    <p class="alert {{Session::get('alert-class', 'alert-warning')}} ">{{$success}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <!-- post delete success alert -->
    <div class="row">
        <div class="col-md-11 mx-auto">
            @if(Session::has('success'))
                <div class="alert alert-dismissible alert-success  alertmessage">
                    <strong>Success</strong>
                    <p class="alert {{Session::get('alert-class', 'alert-warning')}} ">{{ Session::get('success')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <!-- page title -->
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <h3>Post List</h3>
        </div>
    </div>
    <!-- post action -->
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
    <!-- post list -->
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
                    <td><button class="btn btn-link postDetail" data-id="{{$post->id}}">{{$post->title}}</button></td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td><a href="/post/{{$post->id}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="#deleteConfirmModal" class="btn btn-danger postDelete"
                           data-toggle="modal" data-id="{{$post->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- pagination -->
        <ul class="pagination col-md-12 justify-content-center">
            {{$posts->links()}}
        </ul>
    </div>
    <!-- Post Detail Modal -->
    <div class="modal fade" id="postDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="post-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-italic text-sm" id="posted-date"></p>
                    <div id="post-desc"></div>
                    <p class="font-italic text-sm-right" id="posted-user"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Post delete confirm Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this post?</p>
                </div>
                <div class="modal-footer">
                    <form action="/post" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="post_id" name="post_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection