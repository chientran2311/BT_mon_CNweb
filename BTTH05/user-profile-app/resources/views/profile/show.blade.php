@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}'s Profile</div>

                <div class="card-body">
                    @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" style="width: 150px; height: 150px;">
                    @else
                        <p>No avatar set.</p>
                    @endif

                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Bio:</strong> {{ $user->bio }}</p>

                    <!-- Edit Profile Button -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
