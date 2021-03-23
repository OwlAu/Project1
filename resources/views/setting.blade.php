@extends('layouts.app')

@section('content')
<a href='/setting/create_society_profile'>Create society profile</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('isModerator')
                    <h3>This is Seting page</h3>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
