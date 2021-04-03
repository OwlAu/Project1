@extends('layouts.app')
@php
use App\Models\Society;
use App\Models\Event;


@endphp
<style>
    .container {
        margin-top: 10px;
    }

    .address {
        color: red;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#myModal">Edit</button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit profile</h4>
                                </div>
                                <div class="modal-body">
                                    <form action='/update_user_profile/{{$userInfo->id}}' method='POST'
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class='form-group'>
                                            <label>Name:</label>
                                            <div>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{$userInfo->name}}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label>Email:</label>
                                            <div>
                                                <input id="email" type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{$userInfo->email }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label>Student ID:</label>
                                            <div>
                                                <input id="studentId" type="text"
                                                    class="form-control @error('studentId') is-invalid @enderror"
                                                    name="studentId" value="{{$userInfo->studentId }}" required
                                                    autocomplete="studentId" autofocus>

                                                @error('studentId')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label>Faculty:</label>
                                            <select class="form-select" name='faculty'
                                                aria-label="Default select example">
                                                <option value="0"></option>
                                                <option value="1">Faculty of Medicine and Health Sciences</option>
                                                <option value="2">Lee Kong Chian Faculty of Engineering and Science
                                                </option>
                                                <option value="3">Faculty of Engineering and Green Technology</option>
                                                <option value="4">Faculty of Information and Communication Technology
                                                </option>
                                                <option value="5">Faculty of Science</option>
                                                <option value="6">Faculty of Accountancy and Management</option>
                                                <option value="7">Faculty of Creative Industries</option>
                                                <option value="8">Institute of Postgraduate Studies & Research</option>
                                                <option value="9">Institure of Chinese Studies</option>
                                                <option value="10">Institute of Management & Leadership Development
                                                </option>
                                                <option value="11">Centre for Foundation Studies</option>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label>Profile Picture:</label>
                                            <div class="input-group mb-3">
                                                <div> <input type="file" name='profilePic' class="form-control p-1"
                                                        id="inputGroupFile01">
                                                    <span
                                                        style='color:red'>@error('profilePic'){{$message}}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div></div>
                                        <button type='submit' class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Profile Picture:</p>
                            </div>
                            <div class="col">
                                @if($userInfo->profilePic)
                                <img style='width:30%' src='{{asset('uploads/profilePic/'.$userInfo->profilePic)}}'
                                    alt='profilePic'>

                                @else
                                <img style='width:30%' src='{{asset('uploads/profilePic/defaultProfilepic.png')}}'
                                    alt='profilePic'>

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Name:</p>
                            </div>
                            <div class="col">
                                <p>{{$userInfo->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Email:</p>
                            </div>
                            <div class="col">
                                <p>{{$userInfo->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Student ID:</p>
                            </div>
                            <div class="col">
                                @if($userInfo->studentId)
                                <p>{{$userInfo->studentId}}</p>
                                @else
                                <p class='address'>Please update your student id.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Faculty:</p>
                            </div>
                            <div class="col">
                                @if($userInfo->faculty)
                                <p>{{$userInfo->faculty}}</p>
                                @else
                                <p class='address'>Please update your faculty.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 style='margin-top:25px; margin-left:40px;   text-decoration: underline;'>Society List:</h3>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($societiesInfo as $societyInfo)
                                <tr>
                                    <td>{{Society::find($societyInfo->club_id)->name}}</td>
                                    <td>{{$societyInfo->status}} </td>
                                    <td><a href='/society/{{$societyInfo->club_id}}'>More</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 style='margin-top:25px; margin-left:40px; text-decoration: underline'>Event List:</h3>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventsInfo as $eventInfo)
                                <tr>
                                    <td>{{$eventInfo->event_id}}</td>
                                    <td>{{Event::find($eventInfo->event_id)->title}}</td>
                                    <td>{{$eventInfo->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 style='margin-top:25px; margin-left:40px; text-decoration: underline'>My Confessions:</h3>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($confessions as $confession)
                                <tr>
                                    <td>{{$confession->id}}</td>
                                    <td>{{$confession->content}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>





</main>
@endsection