@extends('layouts.app')

<style>
    .flex-container {
        display: flex;
        justify-content: space-evenly;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>
                <div class="card-body">
                    @auth
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Name:</h3>
                            </div>
                            <div class="col">
                                <h3>{{Auth::user()->name}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Student ID:</h3>
                            </div>
                            <div class="col">
                                <h3>{{Auth::user()->studentId}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>UTAR Email:</h3>
                            </div>
                            <div class="col">
                                <h3>{{Auth::user()->email}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                @endauth
            </div>
        </div>

    </div>
</div>
<div class="container" style='margin-top: 50px;'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Society List') }}</div>
                <div class="card-body">
                    @auth
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Name:</h3>
                            </div>
                            <div class="col">
                                <h3>{{Auth::user()->name}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Student ID:</h3>
                            </div>
                            <div class="col">
                                <h3>{{Auth::user()->studentId}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>UTAR Email:</h3>
                            </div>
                            <div class="col">
                                <h3>{{Auth::user()->email}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                @endauth
            </div>
        </div>

    </div>
</div>
</div>
@endsection