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
    <header class="white-text-container section-container">
        <div class="text-center">
            <h1>{{$societyInfo->name}}</h1>
            <a class='btn btn btn-success mt-3' href='/society/{{$societyInfo->id}}/register_society'>Join us</a>
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
                        <h2>Events</h2>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img style='width:20%'
                                        src="{{asset('uploads/announcementImage/'.$eventsInfo[0]->image)}}"
                                        class="img-responsive" alt="...">
                                    <div class="carousel-caption">
                                        <h3 class="h5">{{$eventsInfo[0]->title}}</h3>
                                        <p>{{$eventsInfo[0]->description}}</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img style='width:20%'
                                        src="{{asset('uploads/announcementImage/'.$eventsInfo[1]->image)}}"
                                        class="img-responsive" alt="...">
                                    <div class="carousel-caption">
                                        <h3 class="h5">{{$eventsInfo[1]->title}}</h3>
                                        <p>{{$eventsInfo[1]->description}}</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img style='width:20%'
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
                        <h2>Work</h2>
                        <div class="work-experience">
                            <small class="date">2017-2015</small>
                            <h3 class="h5 date-title">Web developer - <a href="http://en.orson.io"
                                    title="Create professionnal website">Orson.io</a></h3>


                            <p>Leo vel orci porta non pulvinar neque laoreet suspendisse interdum. Vitae ultricies leo
                                integer malesuada nunc. Imperdiet proin fermentum leo vel orci porta non pulvinar neque.
                                Fermentum leo vel orci porta non. Posuere sollicitudin aliquam ultrices sagittis.
                                Aliquam faucibus purus in massa tempor nec.</p>
                        </div>

                        <div class="work-experience">
                            <small class="date">2017-2015</small>
                            <h3 class="h5 date-title">Web developer - <a href="http://mashup-template.com"
                                    title="">Mashup Template</a></h3>

                            <p>Fermentum leo vel orci porta non. Posuere sollicitudin aliquam ultrices sagittis. Aliquam
                                faucibus purus in massa tempor nec.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-block">
                        <h2>Events</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="./assets/images/img-02.jpg" class="img-responsive" alt="">
                                <h3 class="h5">Amelia App</h3>
                                <p>June 2017</p>
                            </div>
                            <div class="col-md-4">
                                <img src="./assets/images/img-03.jpg" class="img-responsive" alt="">
                                <h3 class="h5">Portland</h3>
                                <p>March 2017</p>
                            </div>
                            <div class="col-md-4">
                                <img src="./assets/images/img-04.jpg" class="img-responsive" alt="">
                                <h3 class="h5">Denz for Nilon</h3>
                                <p>Jan 2017</p>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-block">
                        <h2>Education</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="education-experience">
                                    <small class="date">2017-2015</small>
                                    <h3 class="h5 date-title">Design Master</h3>
                                    <p>Chicago University</p>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="education-experience">
                                    <small class="date">2015-2012</small>
                                    <h3 class="h5 date-title">Metrics Degree</h3>
                                    <p>Ecole 87</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="education-experience">
                                    <small class="date">2012-2011</small>
                                    <h3 class="h5 date-title">Motion Design Course</h3>
                                    <p>Pascal’s Lee Studio</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-block">
                        <h2>Language</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="language-experience">
                                    <h3 class="h5">English <small>Bilingual</small></h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="language-experience">
                                    <h3 class="h5">French <small>Fluent</small></h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="language-experience">
                                    <h3 class="h5">Russian <small>Beginner</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-block">
                        <h2>Social Network</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="social-buttons"><a href="https://twitter.com/" title=""><span
                                            class="social-round-icon fa-icon"><i
                                                class="fa fa-twitter"></i></span>@David_Folley</a></p>
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
                </div>

                <div class="card">
                    <div class="card-block">
                        <h2>Contact</h2>
                        <form action="" class="reveal-content">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Enter your message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class=" btn btn-primary">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>
@endsection