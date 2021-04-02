@extends('layouts\app')



@section('content')
<div class="row justify-content-center m-3">
    <h3>Society's Forum List (Memories)</h3>
</div>
<div class='container'>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope='col'>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($forums as $forum)
            <tr>
                <th scope="row">{{$forum->id}}</th>
                <td>{{$forum->title}}</td>
                <td> <img width=100px height=100px src='{{asset('uploads/forumImage/'.$forum->image)}}' alt='image'>
                </td>
                <td>
                    <a href='/update_forum/{{$forum->id}}' type="button" class="btn btn-warning">Edit</a>
                    <a href='/delete_forum/{{$forum->id}}' type="button" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection