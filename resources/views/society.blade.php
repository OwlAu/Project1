@extends('layouts.app')

<style>
    .card {
        display: flex;
        flex-wrap: wrap;
        margin:10px;
    }

    .flex-container {
        flex-direction: row;
        display: flex;
        flex-wrap: wrap;
        margin-left:30px;
        margin-right:30px;
        justify-content: center;
    }
    .societyContainer{
        margin-left:30px;
        margin-right:30px;
        padding:0px;
        justify-content: center;
        position: absolute;
    }
</style>
@section('content')
<div class="societyContainer">
    <div class="col-md-15">
        <h3>Pick your favourite society!</h3>
        <div class='flex-container'>
            @foreach($societies as $society)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('uploads/societyLogo/'.$society->logo)}}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">{{$society->name}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div> 
</div>
@endsection