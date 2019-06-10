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
                    <p class="alert {{Session::get('alert-class','alert-success')}} ">{{ Session::get('success')}}</p>
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
            <input type="text" name="name" value="{{session('name')}}" class="form-control mb-4 mr-3" placeholder="Name">
            <input type="text" name="email" value="{{session('email')}}" class="form-control mb-4 mr-3" placeholder="Email">
            <input type="text" name="dateFrom" value="{{session('dateFrom')}}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" class="form-control mb-4 mr-3" placeholder="Created From">
            <input type="text" name="dateTo" value="{{session('dateTo')}}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" class="form-control mb-4 mr-3" placeholder="Created To">
            <button type="submit" class="btn btn-primary mb-4 mr-3">Search</button>
            <a href="/user/create" class="btn btn-primary mb-4 mr-3">Add</a>
        </form>
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
                    <td>
                        <form action="/user/{{$user->id}}" method="POST">
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
            {{$users->links()}}
        </ul><!-- pagination -->
    </div>
</div><!-- /#userList -->
@endsection