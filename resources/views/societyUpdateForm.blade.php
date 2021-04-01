@extends('layouts.app')

@section('content')
<a href='/setting/createSocietyProfile'>Create society profile</a>
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
                <div class="card-header">{{ __('Update Society Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class='container'>
                        <form action='/setting/updateSociety/{{$societyProfile->id}}' method='POST'
                            enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class='form-group'>
                                <label>Society Name:</label>
                                <input type='text' name='name' class='form-control' value='{{$societyProfile->name}}'
                                    placeholder="Enter society name:">
                            </div>
                            <div class='form-group'>
                                <label>Description:</label>
                                {{-- <input type='textarea' name='description' class='form-control' placeholder="Enter description:"> --}}
                                <textarea style='white-space: pre-wrap;
                                ' name="description" class='form-control' rows="5" cols="30">
                                </textarea>
                                <span style='color:red'>@error('description'){{$message}}@enderror</span>
                            </div>
                            <div class='form-group'>
                                <label>Society Moderator:</label>
                                <input type='text' name='user_id' value='{{$societyProfile->user_id}}'
                                    class='form-control' placeholder="Enter society moderator student ID:">
                            </div>

                            <div class='form-group'>
                                <label>Society Registration Availability:</label>
                                <select class="form-select" name='societyAvailability'
                                    aria-label="Default select example">
                                    <option value="0">Close for registration</option>
                                    <option value="1">Open for registration</option>
                                </select>
                            </div>

                            <div class='form-group'>
                                <label>Society Registration Fees:</label>
                                <input type='text' name='societyFees' value='{{$societyProfile->societyFees}}'
                                    class='form-control' placeholder="Enter society registration fees:">
                            </div>

                            <div class='form-group'>
                                <label>Initial Society Logo:</label>
                                <div class="row">
                                    <div class="col">
                                        <img style='width:70%'
                                            src='{{asset('uploads/societyLogo/'.$societyProfile->logo)}}' alt='image'>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" name='logo' class="form-control p-1"
                                        value='{{$societyProfile->logo}}' id="inputGroupFile01">
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