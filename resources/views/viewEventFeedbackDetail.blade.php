@extends('layouts.app')
@section('content')

<main class="content-wrapper">
    <div class="container">
        <h3>{{$eventInfo->title}}</h3>
        <div class="row">
            <div class='col-lg'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='col'>
                            <p>Participants</p>
                            <p>{{$eventParticipants}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-lg'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='col'>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <p>Views</p>
                            <p>{{$eventViews}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-lg'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='col'>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <p>Conversion Rate</p>
                            <p>{{round($conversionRate,2)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-lg'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='col'>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <p>Feedbacks</p>
                            <p>{{$feedbacks->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection