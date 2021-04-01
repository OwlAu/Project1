@extends('layouts.app')

@section('content')
<a href='/setting/create_society_profile'>Create society profile</a>

<style>
    .container {
        padding: 10px
    }

    .btn {
        position: absolute;
        right: 10px;
        top: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    My Society Info
                    <a href='setting/updateSociety/{{$societyInfo->id}}' type="button" class="btn btn-danger">Edit</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @can('isModerator')
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Logo:</h3>
                            </div>
                            <div class="col">
                                <img style='width:70%' src='{{asset('uploads/societyLogo/'.$societyInfo->logo)}}'
                                    alt='image'>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Name:</h3>
                            </div>
                            <div class="col">
                                <h3>{{$societyInfo->name}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Description:</h3>
                            </div>
                            <div class="col">
                                <h3>{{$societyInfo->description}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Society Availability:</h3>
                            </div>
                            <div class="col">
                                <h3>{{($societyInfo->societyAvailability)? 'Open':'Close'}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Society Registration Fees:</h3>
                            </div>
                            <div class="col">
                                <h3>RM{{$societyInfo->societyFees}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Society Moderator Student ID:</h3>
                            </div>
                            <div class="col">
                                <h3>{{$societyInfo->user_id}}</h3>
                            </div>
                        </div>
                    </div>

                </div>

                @endcan
            </div>
        </div>
    </div>
</div>
</div>

@endsection
<script src='resources\js\app.js'></script>