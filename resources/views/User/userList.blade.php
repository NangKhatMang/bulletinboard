@extends('layouts.layout')

@section('content')
<div id="userList">
    <div class="row">
        <div class="col-md-11 mx-auto">
            @if(Session::has('success-changPwd'))
                <div class="alert alert-dismissible alert-success  alertmessage">
                    <strong>Success</strong>
                    <p class="alert {{Session::get('alert-class','alert-success')}} ">{{ Session::get('success-changPwd')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div><!-- success password change alert -->
    </div>
    <div class="row">
        <div class="col-md-11 mx-auto">
            @if(Session::has('success'))
                <div class="alert alert-dismissible alert-success  alertmessage">
                    <strong>Success</strong>
                    <p class="alert {{Session::get('alert-class','alert-warning')}} ">{{ Session::get('success')}}</p>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div><!-- success password change alert -->
    </div>
    <div class="row mb-3">
        <div class="col">
            <h3>User List</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="/user/search" method="GET" class="form-inline">
            <input type="text" name="name" value="{{session('search_name')}}" class="form-control mb-4 mr-3" placeholder="Name">
            <input type="text" name="email" value="{{session('search_email')}}" class="form-control mb-4 mr-3" placeholder="Email">
            <input type="text" name="dateFrom" value="{{session('search_date_from')}}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" class="form-control mb-4 mr-3" placeholder="Created From">
            <input type="text" name="dateTo" value="{{session('search_date_to')}}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" class="form-control mb-4 mr-3" placeholder="Created To">
            <button type="submit" class="btn btn-primary mb-4 mr-3">Search</button>
            <a href="/user/create" class="btn btn-primary mb-4 mr-3">Add</a>
        </form>
        @if ($errors->has('email'))    
            <div class="mb-4 text-danger">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="row">
        <table class="table table-responsive-md table-striped table-bordered text-center col-md-11 mx-auto">
            <thead class="thead-dark">
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created User</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>Address</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <td>{{$users->firstItem() + $key}}</td>
                    <td><a href="/user/profile/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_user_name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->dob}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td><a href="/user/{{$user->id}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="#deleteConfirmModal" class="btn btn-danger userDelete"
                            data-toggle="modal" data-id="{{$user->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <ul class="pagination col-md-12 justify-content-center">
            {{$users->links()}}
        </ul><!-- pagination -->
    </div>
    <!-- User delete confirm Modal -->
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
                    <form action="/user" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="user_id" name="user_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /#userList -->
@endsection