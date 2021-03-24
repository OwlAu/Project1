@extends('layouts.app')

<style>
    .flex-container {
        display: flex;
        justify-content: space-evenly;
    }
</style>
@section('content')
<div class="row justify-content-center m-3">
    <h3>Society's Announcement List</h3>
</div>
<div class='container'>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope='col'>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
            <tr>
                <th scope="row">{{$announcement->id}}</th>
                <td>{{$announcement->title}}</td>
                <td>{{$announcement->description}}</td>
                <td> <img width=100px height=100px src='{{asset('uploads/announcementImage/'.$announcement->image)}}' alt='image'>
                </td>
                <td>
                    <a href='' type="button" class="btn btn-warning" >Edit</a>
                    <a href='' type="button" class="btn btn-danger" >Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection