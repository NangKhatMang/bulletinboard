@extends('layouts.layout')

@section('content')
<div id="postList">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>User List</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="/search" method="GET" class="form-inline ">
            <input type="text" class="form-control mb-4 mr-3"> 
            <button type="submit" class="btn btn-primary mb-4 mr-3">Search</button>
        </form>
        <a href="/userAdd" class="btn btn-primary mb-4 mr-3">Add</a>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered text-center col-md-9 mx-auto">
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
</div><!-- /#postList -->
@endsection