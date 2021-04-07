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
        <h3 style='margin-top:30px;'>Event Participants</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment Image</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventParticipants as $eventParticipant)
                <tr>
                    <th scope="row">{{$eventParticipant->id}}</th>
                    <td>{{User::where('studentId',$eventParticipant->user_id)->first()->name}}</td>
                    </td>
                    <td>{{$eventParticipant->user_id}}</td>
                    </td>
                    <td>{{$eventParticipant->status}}</td>
                    <td style='width:200px'> <a data-lightbox="image-1"
                            href='{{asset('uploads/eventRegisteration/'.$eventParticipant->paymentImg)}}'
                            alt='image'><img style='width:100%'
                                src="{{asset('uploads/eventRegisteration/'.$eventParticipant->paymentImg)}}"
                                class="img-responsive" alt=""></a>
                    </td>
                    <td>
                        <a href='/event_feedback/{{$eventInfo->id}}/participants/{{$eventParticipant->id}}/accept_registration'
                            type="button" class="btn btn-success">Accept</a>
                        <a href='' type="button" class="btn btn-danger">Deny</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- END Event Participants Table --}}
    </div>
</main>
@endsection