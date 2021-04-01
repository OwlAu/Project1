@extends('layouts.app')

@php
use Illuminate\Support\Facades\DB;
$validateUser =
DB::table('society_members')->where('club_id',$societyInfo->club_id)->where('user_id',$societyInfo->user_id)->first();
@endphp

@section('content')

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
            <div class="col-xs-12">

                <div class="card">
                    <div class="card-block">
                        <h2>About Us</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <p><img src="{{asset('uploads/societyLogo/'.$societyInfo->logo)}}"
                                        class="img-responsive" alt=""></p>
                            </div>
                            <div class="col-md-8">

                                <p>{{$societyInfo->description}}</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="/society/{{$societyInfo->id}}/events" accept-charset="UTF-8">
                            @csrf
                            <button type="submit" class="btn-link">
                                <h2>Events >> </h2>
                            </button>
                            <input hidden value="{{$societyInfo->id}}" name='id' />
                        </form>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img style='width:40%'
                                        src="{{asset('uploads/announcementImage/'.$eventsInfo[0]->image)}}"
                                        class="img-responsive" alt="...">
                                    <div class="carousel-caption">
                                        <h3 class="h5">{{$eventsInfo[0]->title}}</h3>
                                        <p>{{$eventsInfo[0]->description}}</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img style='width:40%'
                                        src="{{asset('uploads/announcementImage/'.$eventsInfo[1]->image)}}"
                                        class="img-responsive" alt="...">
                                    <div class="carousel-caption">
                                        <h3 class="h5">{{$eventsInfo[1]->title}}</h3>
                                        <p>{{$eventsInfo[1]->description}}</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img style='width:40%'
                                        src="{{asset('uploads/announcementImage/'.$eventsInfo[2]->image)}}"
                                        class="img-responsive" alt="...">
                                    <div class="carousel-caption">
                                        <h3 class="h5">{{$eventsInfo[2]->title}}</h3>
                                        <p>{{$eventsInfo[2]->description}}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="/society/{{$societyInfo->id}}/announcements" accept-charset="UTF-8">
                            @csrf
                            <button type="submit" class="btn-link">
                                <h2>Latest Announcement >> </h2>
                            </button>
                            <input hidden value="{{$societyInfo->id}}" name='id' />
                        </form>

                        {{-- <a href='/society/{{$societyInfo->id}}/announcements'>
                        <h2>Lastest Announcement >> </h2>
                        </a> --}}

                        <div class="work-experience">
                            <small class="date"> {{$announcements[0]->created_at}}</small>
                            <h3 class="h5 date-title">{{$announcements[0]->title}}
                                <a href="http://en.orson.io" title="Create professionnal website"></a></h3>

                            <p>{{$announcements[0]->description}}</p>
                        </div>

                        <div class="work-experience">
                            <small class="date">{{$announcements[1]->created_at}}</small>
                            <h3 class="h5 date-title">{{$announcements[1]->title}} <a href="http://mashup-template.com"
                                    title=""></a></h3>

                            <p>{{$announcements[1]->description}}</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="/society/{{$societyInfo->id}}/memories" accept-charset="UTF-8">
                            @csrf
                            <button type="submit" class="btn-link">
                                <h2>Our Memories >> </h2>
                            </button>
                            <input hidden value="{{$societyInfo->id}}" name='id' />
                        </form>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('uploads/announcementImage/'.$forums[0]->image)}}"
                                    class="img-responsive" alt="">
                                <h3 class="h5">{{$forums[0]->title}}</h3>
                                <p>{{$forums[0]->created_at}}</p>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('uploads/announcementImage/'.$forums[1]->image)}}"
                                    class="img-responsive" alt="">
                                <h3 class="h5">{{$forums[1]->title}}</h3>
                                <p>{{$forums[1]->created_at}}</p>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('uploads/announcementImage/'.$forums[2]->image)}}"
                                    class="img-responsive" alt="">
                                <h3 class="h5">{{$forums[2]->title}}</h3>
                                <p>{{$forums[2]->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>





                {{-- <div class="card">
                    <div class="card-block">
                        <h2>Social Network</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="social-buttons"><a href="https://twitter.com/" title=""><span
                                            class="social-round-icon fa-icon"><i
                                                class="fa fa-facebook"></i></span>@David_Folley</a></p>
                            </div>
                            <div class="col-md-3">
                                <p class="social-buttons"><a href="https://www.linkedin.com/" title=""><span
                                            class="social-round-icon fa-icon"><i class="fa fa-linkedin"></i></span>David
                                        Folley</a></p>
                            </div>
                            <div class="col-md-3">
                                <p class="social-buttons"><a href="https://dribbble.com/" title=""><span
                                            class="social-round-icon fa-icon"><i class="fa fa-dribbble"></i></span>David
                                        Folley</a></p>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

</main>
@endsection