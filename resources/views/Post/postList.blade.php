@extends('layouts.app')

@section('content')
<div id="postList">
    <div class="btnList clearFix">
        <form action="/search" method="GET">
            <input type="text"> 
            <button type="submit">Search</button>
            <a href="/addPost">Add</a>
            <a href="/upload">Upload</a>
            <a href="/download">Download</a>
        </form>
    </div>
    <div class="postList">
        <table>
            <thead>
                <th class="th01">Post Title</th>
                <th class="th02">Post Description</th>
                <th class="th03">Posted User</th>
                <th class="th04">Posted Date</th>
                <th class="action"></th>
                <th class="action"></th>
            </thead>
            <tbody>
                <tr>
                    <td><a href="">Title 1</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/edit">Edit</a></td>
                    <td><a href="/delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 2</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/edit">Edit</a></td>
                    <td><a href="/delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 3</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/edit">Edit</a></td>
                    <td><a href="/delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 4</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/edit">Edit</a></td>
                    <td><a href="/delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="">Title 5</a></td>
                    <td>Description 1</td>
                    <td>User 1</td>
                    <td>5/10/2019</td>
                    <td><a href="/edit">Edit</a></td>
                    <td><a href="/delete">Delete</a></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div><!-- /#postList -->
@endsection