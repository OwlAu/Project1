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
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="card">
                    <div class="card-block">
                        <h2>#{{$eventInfo->title}}</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <p><img src="{{asset('uploads/announcementImage/'.$eventInfo->image)}}"
                                        class="img-responsive" alt="">
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
                                    <form method="POST"
                                        action="/society/{{$societyInfo->id}}/events/{{$eventInfo->title}}/register"
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
            </div>
        </div>
    </div>

    {{-- Feedback form --}}
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class='card'>
                    <div class="card-block">
                        <h2 style='margin-bottom: 0px;'>Share your feedback with us.</h2>
                        <h3>We will listen to your feedbacks.</h3>

                        <form action='/create_feedback' method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <label>Your feedback:</label>
                                <textarea class="form-control" aria-label="With textarea" name='feedback' rows='5'
                                    cols="10"></textarea>
                            </div>
                            <input hidden name='event_id' value={{$eventInfo->id}}>
                            <button type='submit' class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @foreach($feedbacks as $feedback) <div class="card">
                    <div class="card-block">
                        <h2>Feedback#{{$feedback->id}}</h2>
                        <p>{{$feedback->created_at}}</p>
                        <div class="row">
                            <div class="col-md-8">
                                <p>{{$feedback->feedback}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection