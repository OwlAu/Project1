@extends('layouts.app')

<style>
    .card {
        display: flex;
        flex-wrap: wrap;
        margin: 10px;
    }

    .flex-container {
        flex-direction: row;
        display: flex;
        flex-wrap: wrap;
        margin-left: 30px;
        margin-right: 30px;
        justify-content: center;
    }

    .societyContainer {
        margin-left: 30px;
        margin-right: 30px;
        padding: 0px;
        justify-content: center;
        position: absolute;
    }

    .w-5 {
        display: none
    }
</style>
@section('content')
<div class="societyContainer">
    <div class="col-md-15">
        <h3>Pick your favourite event!</h3>
        <div class='flex-container'>
            @foreach($events as $event)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('uploads/announcementImage/'.$event->image)}}" alt="Card image cap">
                <div class="card-body">
                    <p style='float:left;' class="card-text">{{$event->title}}</p>
                    <a style='float:right;' href='/event/{{$event->id}}'>Learn More></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex" >
        <div class="mx-auto">
            {{$events->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>


@endsection