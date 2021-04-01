@extends('layouts.app')

@section('content')

<head>
    {{-- Imported Society Detail Page CSS --}}
    <link href="{{ asset('css/societyDetail.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/main.bc58148c.js')}}"></script>
</head>
<!-- Add your content of header -->
<div class="background-color-layer" style="background-image: url('assets/images/img-01.jpg')"></div>
<main class="content-wrapper">

    <!-- Add your site or app content here -->
    <div class="card">
        <div class="card-block">
            <h2>#{{$eventInfo->title}}</h2>
            <div class="row">
                <div class="col-md-4">
                    <p><img src="{{asset('uploads/announcementImage/'.$eventInfo->image)}}" class="img-responsive"
                            alt="">
                    </p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2">
                            Description:
                        </div>
                        <div class="col-md-8">
                            {{$eventInfo->description}}
                        </div>
                    </div>
                    <div class="row" style='margin-top:30px'>
                        <div class="col-md-2">
                            Registration Fees:
                        </div>
                        <div class="col-md-8">
                            RM{{$eventInfo->eventFees}}
                        </div>
                    </div>
                    <div class="row" style='margin-top:30px'>
                        <div class="col-md-2">
                            Slots available:
                        </div>
                        <div class="col-md-8">
                            {{$eventInfo->maxParticipants}}
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
                        <form method="POST" action="/society/{{$societyInfo->id}}/events/{{$eventInfo->title}}/register"
                            accept-charset="UTF-8">
                            @csrf
                            <button type="submit" class='btn btn btn-success'>
                                Register now
                            </button>
                            <input hidden value="{{$eventInfo->id}}" name='eventId' />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection