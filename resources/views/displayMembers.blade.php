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
    <h3>Total number of members: {{$pendingUsers->count()}}</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Student ID</th>
                <th scope="col">Payment Image</th>
                <th scope="col">Status</th>
                <th scope='col'>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingUsers as $pendingUser)
            <tr>
                <th scope="row">{{$pendingUser->id}}</th>
                <td>{{User::where('studentId','=',$pendingUser->user_id)->first()->name}}</td>
                <td>{{User::where('studentId','=',$pendingUser->user_id)->first()->studentId}}</td>
                <td style='width:50px'> <a data-lightbox="image-1"
                        href='{{asset('uploads/memberRegistration/'.$pendingUser->paymentImg)}}' alt='image'><img
                            style='width:15%' src="{{asset('uploads/memberRegistration/'.$pendingUser->paymentImg)}}"
                            class="img-responsive" alt=""></a>
                </td>
                <td>{{$pendingUser->status}}</td>
                <td>
                    {{-- <a href='/accept_user_request/{{$pendingUser->user_id}}' type="button"
                    class="btn btn-warning">Accept</a> --}}
                    {{-- <a href='' type="button" class="btn btn-danger">Deny</a> --}}
                    <form method="POST" action="/kick_member/{{$pendingUser->user_id}}" accept-charset="UTF-8">
                        {{method_field('PUT')}}
                        @csrf
                        <button type="submit" class="btn btn-danger">Kick out</button>
                        <input type="hidden" value="{{$pendingUser->user_id}}" name='user_id' />
                    </form>
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
    
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

@endsection