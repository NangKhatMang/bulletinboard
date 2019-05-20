@extends('layouts.app')

@section('content')
<div id="postList">
    <div class="btn clearFix">
        <form action="/search" method="GET">
            <input type="text"> <button type="submit">Search</button>
        </form>
        <a href="/add">Add</a>
        <a href="/upload">Upload</a>
        <a href="/download">Download</a>
    </div>
</div><!-- /.postList -->
<table>
    <thead>
        <th>Post Title</th>
        <th>Post Description</th>
        <th>Posted User</th>
        <th>Posted Date</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <tr>
            <td><a href="">Title 1</a></td>
            <td>Description 1</td>
            <td>Posted User</td>
            <td>5/10/2019</td>
            <td><a href="/edit">Edit</a></td>
            <td><a href="/delete">Delete</a></td>
        </tr>
    </tbody>
    

</table>
@endsection