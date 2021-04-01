@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registration for: <p style='font-weight:bold; font-size:25px'>
                        {{$eventInfo->title}}</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class='container'>
                        <form action='/society/{$eventInfo->id}/events/{$eventInfo->name}/registerUser' method='POST'
                            enctype="multipart/form-data">
                            @csrf
                            <div class='form-group'>
                                <div>
                                    <input hidden id="event_id" type="event_id"
                                        class="form-control @error('event_id') is-invalid @enderror" name="event_id"
                                        value="{{$eventInfo->id}}" required autocomplete="event_id" autofocus>

                                    @error('event_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-group'>
                                <label>Student ID:</label>
                                <div>
                                    <input readonly id="user_id" type="user_id"
                                        class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                        value="{{ Auth::user()->studentId }}" required autocomplete="user_id" autofocus>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-group'>
                                <label>Event Registration Fees:</label>
                                <div>
                                    <input disabled id="user_id" type="user_id"
                                        class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                        value="{{ $eventInfo->eventFees }}" required autocomplete="user_id" autofocus>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-group'>
                                <label>Bank Statement:</label>
                                <div class="input-group">
                                    <input type="file" name='paymentImg' class="form-control p-1" id="inputGroupFile01">
                                </div>
                                <span style='color:red'>@error('paymentImg'){{$message}}@enderror</span>
                            </div>
                            <button type='submit' class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection