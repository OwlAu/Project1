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
                <div class="card-header">{{ __('Create New Forum') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class='container'>
                        <form action='/create_society_forum' method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class='form-group'>
                                <label>Title:</label>
                                <div>
                                    <input id="title" type="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-group'>
                                <label>Image:</label>
                                <div class="input-group">
                                    <input type="file" name='image' class="form-control p-1" id="inputGroupFile01">
                                </div>
                                <span style='color:red'>@error('image'){{$message}}@enderror</span>
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