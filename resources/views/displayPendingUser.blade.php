@extends('layouts.app')
@php
use App\Models\User;
@endphp

<style>
    .flex-container {
        display: flex;
        justify-content: space-evenly;
    }
</style>

<head>
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/lightbox-plus-jquery.js')}}"></script>
</head>
@section('content')
<div class="row justify-content-center m-3">
    <h3>Society's Announcement List</h3>
</div>
<div class='container'>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Student ID</th>
                <th scope="col">Payment Image</th>
                <th scope='col'>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingUsers as $pendingUser)
            <tr>
                <th scope="row">{{$pendingUser->id}}</th>
                <td>{{User::where('studentId','=',$pendingUser->user_id)->first()->name}}</td>
                <td>{{User::where('studentId','=',$pendingUser->user_id)->first()->studentId}}</td>
                <td> <a data-lightbox="image-1" href='{{asset('uploads/memberRegistration/'.$pendingUser->paymentImg)}}'
                        alt='image'><img src="{{asset('uploads/memberRegistration/'.$pendingUser->paymentImg)}}"
                            class="img-responsive" alt=""></a>
                </td>
                <td>
                    <a href='/update_announcement/{{$pendingUser->id}}' type="button" class="btn btn-warning">Edit</a>
                    <a href='/delete_announcement/{{$pendingUser->id}}' type="button" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    lightbox.option({
      'resizeDuration': 100,
      'wrapAround': true,
    })
</script>
@endsection