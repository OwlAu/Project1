@extends('layouts.app')

@section('content')
<a href='/setting/createannouncement'>Create society profile</a>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Announcement') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class='container'>
                        <form action='/update_announcement/{{$announcement->id}}' method='POST' enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class='form-group'>
                                <label>Announcement Title:</label>
                                <input type='text' name='title' class='form-control' value='{{$announcement->title}}' placeholder="Enter new announcement title:">
                            </div>
                            <div class='form-group'>
                                <label>Announcement Description:</label>
                                <input type='text' name='description' class='form-control' value='{{$announcement->description}}' placeholder="Enter society description:">
                            </div>

                            <div class='form-group'>
                                <label>Initial Announcement Image:</label>
                                <div class="row">
                                    <div class="col">
                                        <img style='width:70%' src='{{asset('uploads/announcementImage/'.$announcement->image)}}' alt='image'>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" name='image' class="form-control p-1" value='{{$announcement->image}}' id="inputGroupFile01">
                                </div>
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