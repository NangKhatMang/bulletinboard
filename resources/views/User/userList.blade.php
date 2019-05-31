@extends('layouts.layout')

@section('content')
<div id="userList">
    <div class="row mb-3">
        <div class="col">
            <h3>User List</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="/search" method="GET" class="form-inline">
            <input type="text" class="form-control mb-4 mr-3" placeholder="Name">
            <input type="text" class="form-control mb-4 mr-3" placeholder="Email">
            <input type="date" class="form-control mb-4 mr-3" placeholder="Created From">
            <input type="date" class="form-control mb-4 mr-3" placeholder="Created To">
            <button type="submit" class="btn btn-primary mb-4 mr-3">Search</button>
            <a href="/user/create" class="btn btn-primary mb-4 mr-3">Add</a>
        </form>
    </div>
    <div class="row">
        <table class="table table-responsive-md table-striped table-bordered text-center col-md-11 mx-auto">
            <thead class="thead-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Created User</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>Address</th>
                <th>Posted Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>User 1</td>
                    <td>user1@gmail.com</td>
                    <td>User 1</td>
                    <td>09789565876</td>
                    <td>5/5/1995</td>
                    <td>Yangon</td>
                    <td>5/10/2019</td>
                    <td><a href="/userDelete">Delete</a></td>
                </tr>
                <tr>
                    <td>User 2</td>
                    <td>user2@gmail.com</td>
                    <td>User 2</td>
                    <td>09789565876</td>
                    <td>5/5/1995</td>
                    <td>Yangon</td>
                    <td>5/10/2019</td>
                    <td><a href="/userDelete">Delete</a></td>
                </tr>
                <tr>
                    <td>User 3</td>
                    <td>user3@gmail.com</td>
                    <td>User 3</td>
                    <td>09789565876</td>
                    <td>5/5/1995</td>
                    <td>Yangon</td>
                    <td>5/10/2019</td>
                    <td><a href="/userDelete">Delete</a></td>
                </tr>
                <tr>
                    <td>User 4</td>
                    <td>user4@gmail.com</td>
                    <td>User 4</td>
                    <td>09789565876</td>
                    <td>5/5/1995</td>
                    <td>Yangon</td>
                    <td>5/10/2019</td>
                    <td><a href="/userDelete">Delete</a></td>
                </tr>
                <tr>
                    <td>User 5</td>
                    <td>user5@gmail.com</td>
                    <td>User 5</td>
                    <td>09789565876</td>
                    <td>5/5/1995</td>
                    <td>Yangon</td>
                    <td>5/10/2019</td>
                    <td><a href="/userDelete">Delete</a></td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination col-md-12 justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#">7</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="row">
        <table class="table table-responsive-md table-striped table-bordered text-center col-md-11 mx-auto">
            <thead class="thead-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Created User</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>Address</th>
                <th>Posted Date</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><a href="">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->create_user_id}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->dob}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->created_at}}</td>
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
        </ul>
    </div>
</div><!-- /#userList -->
@endsection