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
                                <p>Logo:</p>
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
                                <p>Name:</p>
                            </div>
                            <div class="col">
                                <p>{{$societyInfo->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Description:</p>
                            </div>
                            <div class="col">
                                <p>{{$societyInfo->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Society Availability:</p>
                            </div>
                            <div class="col">
                                <p>{{($societyInfo->societyAvailability)? 'Open':'Close'}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Society Registration Fees:</p>
                            </div>
                            <div class="col">
                                <p>RM{{$societyInfo->societyFees}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Society Moderator Student ID:</p>
                            </div>
                            <div class="col">
                                <p>{{$societyInfo->user_id}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Bank:</p>
                            </div>
                            <div class="col">
                                @if($societyInfo->bank)
                                <p>{{$societyInfo->bank}}</p>
                                @else
                                <p class='address' style='color:red'>Please update the bank info.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Bank Number:</p>
                            </div>
                            <div class="col">
                                @if($societyInfo->bankNumber)
                                <p>{{$societyInfo->bankNumber}}</p>
                                @else
                                <p class='address' style='color:red'>Please update the bank account number.</p>
                                @endif
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