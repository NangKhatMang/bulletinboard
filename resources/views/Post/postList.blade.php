@extends('layouts.layout')

@section('content')
<div id="postList">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col">
            <h3>Post List</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="/search" method="GET" class="form-inline">
            <div class="form-group mb-2">
                <input type="text" class="form-control mb-4 mr-3" placeholder="Search...">
                <button type="submit" class="btn btn-primary mb-4 mr-3">Search</button>
                <a href="/postAdd" class="btn btn-primary mb-4 mr-3">Add</a>
                <a href="/upload" class="btn btn-primary mb-4 mr-3">Upload</a>
                <a href="/download" class="btn btn-primary mb-4 mr-3">Download</a>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-responsive-md table-striped table-bordered text-center col-md-9 mx-auto">
            <thead class="thead-dark">
                <th class="th01">Post Title</th>
                <th class="th02">Post Description</th>
                <th class="th03">Posted User</th>
                <th class="th04">Posted Date</th>
                <th class="action" colspan="2">Action</th>
            </thead>
            <tbody>
                <tr>
                    <td><a href="">Title 1</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/postEdit">Edit</a></td>
                    <td><a href="/postDelete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 2</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/postEdit">Edit</a></td>
                    <td><a href="/postDelete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 3</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/postEdit">Edit</a></td>
                    <td><a href="/postDelete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 4</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/postEdit">Edit</a></td>
                    <td><a href="/postDelete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 5</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/postEdit">Edit</a></td>
                    <td><a href="/postDelete">Delete</a></td>
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