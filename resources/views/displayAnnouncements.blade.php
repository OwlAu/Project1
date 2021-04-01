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
            <h2>Announcements</h2>
            {{-- Dynamic Button START --}}
            @if($societyInfo->societyAvailability === 0 )
            <a class='btn btn btn-warning mt-3' href=''>Unavailable</a>
            @elseif($validateUser===NULL)
            <a class='btn btn btn-warning mt-3' href=''>Joined</a>
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
    <div class="container">
        <div class="row">
            <a href='{{ url()->previous() }}
                ' style='margin-left:30px;'>
                <h2 style='color:white;'>
                    << Back</h2> </a> <div class="col-xs-12">
                        @foreach($announcements as $announcement) <div class="card">
                            <div class="card-block">
                                <h2>#{{$announcement->title}}</h2>
                                <p>{{$announcement->created_at}}</p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><img src="{{asset('uploads/announcementImage/'.$announcement->image)}}"
                                                class="img-responsive" alt=""></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>{{$announcement->description}}</p>
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