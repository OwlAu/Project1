@extends('layouts.app')
@php
use App\Models\EventFeedback;
use App\Models\EventParticipant;
use App\Models\EventView;
@endphp
@section('content')
<div class="container">
    <div class="row">
        <h2>Event Feedback Details:</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Event</th>
                    <th scope="col"># of feedbacks</th>
                    <th scope="col"># of views</th>
                    <th scope="col"># of participants</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventsInfo as $eventInfo)
                <tr>
                    <th scope="row">{{$eventInfo->id}}</th>
                    <td>{{$eventInfo->title}}</td>
                    <td>{{EventFeedback::where('event_id',$eventInfo->id)->count()}}</td>
                    <td>{{EventView::where('event_id',$eventInfo->id)->count()}}</td>
                    <td>{{EventParticipant::where('event_id',$eventInfo->id)->count()}}</td>
                    <td>{{$eventInfo->title}}</td>
                    <td><a href='/event_feedback/{{$eventInfo->id}}' class='btn btn-warning'>View more</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection