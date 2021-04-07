@extends('layouts.app')
@php
use App\Models\User;
@endphp
@section('content')

<head>
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/lightbox-plus-jquery.js')}}"></script>
</head>
<main class="content-wrapper">
    <div class="container">
        <h3>{{$eventInfo->title}}</h3>
        {{-- START Event Analysis Header --}}
        <div class="row">
            <div class='col-lg'>
                <a href='/event_feedback/{{$eventInfo->id}}/participants'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='col'>
                                <div class='row'>
                                    <img src='{{asset('uploads/stockImage/group_icon.svg')}}'
                                        style='width:20px; margin-bottom:12px; margin-right:10px;'>
                                    <p>Participants</p>
                                </div>
                                <div class='row'>
                                    <h3>{{$eventParticipantsCount}}</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class='col-lg'>
                <a href=#>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='col'>
                                <div class='row'>
                                    <img src='{{asset('uploads/stockImage/visibility_icon.svg')}}'
                                        style='width:20px; margin-bottom:12px; margin-right:10px;'>
                                    <p>Views</p>
                                </div>
                                <div class='row'>

                                    <h3>{{$eventViews}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class='col-lg'>
                <a href='/event_feedback/{{$eventInfo->id}}/feedbacks'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='col'>
                                <div class='row'>
                                    <img src='{{asset('uploads/stockImage/feedback_icon.svg')}}'
                                        style='width:20px; margin-bottom:12px; margin-right:10px;'>
                                    <p>Feedbacks</p>
                                </div>
                                <div class='row'>

                                    <h3>{{$feedbacks->count()}}</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class='col-lg'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='col'>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <p>Conversion Rate</p>
                            <h3>{{round($conversionRate,2)}}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- END Event Analysis Header --}}

        {{-- START Event Participants Table --}}
        <h3 style='margin-top:30px;'>Event Feedbacks</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr>
                    <th scope="row">{{$feedback->id}}</th>
                    <td>{{User::where('studentId',$feedback->user_id)->first()->name}}</td>
                    <td>{{$feedback->feedback}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- END Event Participants Table --}}
    </div>
</main>
@endsection