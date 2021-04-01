@extends('layouts.app')
@section('content')

<head>
    {{-- Imported Society Detail Page CSS --}}
    <link href="{{ asset('css/societyDetail.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/main.bc58148c.js')}}"></script>
</head>
<style>
    .w-5 {
        display: none
    }
</style>
<!-- Add your content of header -->
<div class="background-color-layer" style="background-image: url('assets/images/img-01.jpg')"></div>
<main class="content-wrapper">

    <!-- Add your site or app content here -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-block">
                        <h2>Events</h2>
                        <div class="row">
                            @foreach ($events as $event)
                            <div class="col-md-4">
                                <img src="{{asset('uploads/announcementImage/'.$event->image)}}" class="img-responsive"
                                    alt="">
                                <h3 class="h5">{{$event->title}}</h3>
                                <a style='float:right;' href='/events/{{$event->id}}'>Learn More></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="mx-auto">
                            {{$events->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>
@endsection