@extends('layouts/app')

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
                <div class='card'>
                    <div class="card-block">
                        <h2 style='margin-bottom: 0px;'>Share your thought</h2>
                        <h3>Your identity will not be disclosed.</h3>

                        <form action='/create_confession' method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <label>Your thought:</label>
                                <textarea class="form-control" aria-label="With textarea" name='content' rows='5'
                                    cols="10"></textarea>
                            </div>
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
                @foreach($confessions as $confession) <div class="card">
                    <div class="card-block">
                        <h2>Confession#{{$confession->id}}</h2>
                        <p>{{$confession->created_at}}</p>
                        <div class="row">
                            <div class="col-md-8">
                                <p>{{$confession->content}}</p>
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