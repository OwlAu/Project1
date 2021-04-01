@extends('layouts.app')

@section('content')


@php
use Illuminate\Support\Facades\DB;
$validateUser =
DB::table('society_members')->where('club_id',$societyInfo->club_id)->where('user_id',$societyInfo->user_id)->first();
@endphp



<head>
    {{-- Imported Society Detail Page CSS --}}
    <link href="{{ asset('css/societyDetail.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/main.bc58148c.js')}}"></script>
</head>
<!-- Add your content of header -->
<div class="background-color-layer" style="background-image: url('assets/images/img-01.jpg')"></div>
<main class="content-wrapper">
    <header class="white-text-container section-container">
        <div class="text-center">
            <h1>{{$societyInfo->name}}</h1>
            <h2>Events</h2>
            {{-- Dynamic Button START --}}
            @if($societyInfo->societyAvailability === 0 )
            <button class='btn btn btn-warning mt-3' href=''>Unavailable</button>
            @elseif($validateUser===NULL)
            <button class='btn btn btn-warning mt-3' href=''>Joined</button>
            @else
            <a class='btn btn btn-success mt-3' href='/society/{{$societyInfo->id}}/register_society'>Join us</a>
            @endif
            {{-- Dynamic Button END --}}
            <p>
                <a hidden class="fa-icon fa-icon-2x" href="https://facebook.com/" title="">
                    <i class="fa fa-facebook"></i>
                </a>
                <a hidden class="fa-icon fa-icon-2x" href="https://twitter.com/" title="">
                    <i class="fa fa-twitter"></i>
                </a>
                <a hidden class="fa-icon fa-icon-2x" href="https://dribbble.com/" title="">
                    <i class="fa fa-dribbble"></i>
                </a>
                <a hidden class="fa-icon fa-icon-2x" href="https://www.linkedin.com/" title="">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a hidden class="fa-icon fa-icon-2x" href="https://vimeo.com/" title="">
                    <i class="fa fa-vimeo"></i>
                </a>
            </p>
        </div>
    </header>

    <!-- Add your site or app content here -->
    <div class="card">
        <div class="card-block">
            <h2>#{{$event->title}}</h2>
            <div class="row">
                <div class="col-md-4">
                    <p><img src="{{asset('uploads/announcementImage/'.$event->image)}}" class="img-responsive" alt="">
                    </p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2">
                            Description:
                        </div>
                        <div class="col-md-8">
                            {{$event->description}}
                        </div>
                    </div>
                    <div class="row" style='margin-top:30px'>
                        <div class="col-md-2">
                            Registration Fees:
                        </div>
                        <div class="col-md-8">
                            RM{{$event->eventFees}}
                        </div>
                    </div>
                    <div class="row" style='margin-top:30px'>
                        <div class="col-md-2">
                            Slots available:
                        </div>
                        <div class="col-md-8">
                            {{$event->maxParticipants}}
                        </div>
                    </div>
                    <div class="row" style='margin-top:30px'>
                        <div class="col-md-2">
                            Organizer:
                        </div>
                        <div class="col-md-8">
                            {{$societyInfo->name}}
                        </div>
                    </div>
                    <div class="row" style='margin-top:30px'>
                        <form method="POST" action="/society/{{$societyInfo->id}}/events/{{$event->title}}/register"
                            accept-charset="UTF-8">
                            @csrf
                            <button type="submit" class='btn btn btn-success'>
                                Register now
                            </button>
                            <input hidden value="{{$event->id}}" name='eventId' />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection