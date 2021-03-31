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
                <div class="card-header">{{ __('Registration') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class='container'>
                        <form action='/society/{id}/register_society' method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class='form-group'>
                                <label></label>
                                <div>
                                    <input hidden id="club_id" type="club_id"
                                        class="form-control @error('club_id') is-invalid @enderror" name="club_id"
                                        value="{{$societyInfo->id}}" required autocomplete="club_id" autofocus>

                                    @error('club_id')
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