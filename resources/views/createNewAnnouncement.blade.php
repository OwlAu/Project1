@extends('layouts.app')

@section('content')
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
                <div class="card-header">{{ __('Create New Announcement') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class='container'>
                        <form action='{{route('/create_new_announcement')}}' method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class='form-group'>
                                <label>Title:</label>
                                <input type='text' name='title' class='form-control' placeholder="Enter announcement title:">
                            </div>
                            <div class='form-group'>
                                <label>Description:</label>
                                {{-- <input type='textarea' name='description' class='form-control' placeholder="Enter description:"> --}}
                                <textarea name="description" class='form-control' rows="5" cols="30">
                                </textarea>
                            </div>
  
                            <div class='form-group'>
                                <label>Image:</label>
                                <div class="input-group mb-3">
                                    <input type="file" name='image' class="form-control p-1" id="inputGroupFile01">
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