@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>You are logged in!</p>
                        <p>Do you want to check your profile?</p>
                        <p>Let's check it right here!</p>
                        <a href="{{ route('profile.show', Auth::id()) }}" class="btn btn-primary my-3">
                            Check Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
