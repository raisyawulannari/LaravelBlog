@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('Dashboard') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="text-center my-4">
                        <img src="{{ asset('storage/images/hai.gif') }}" alt="Welcome Image" class="img-fluid rounded-circle" style="width: 200px; height: 200px;">
                    </div>


                    <div class="text-center">
                        <h3 class="text-primary mb-4">{{ __('Welcome Back!') }}</h3>
                        <p class="lead">{{ __('You are logged in and ready to explore the application.') }}</p>
                    </div>

                    <div class="d-flex justify-content-around mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">View Posts</a>
                        <a href="{{ route('jobs.index') }}" class="btn btn-success btn-lg">Manage Jobs</a>
                        <a href="{{ route('locations.index') }}" class="btn btn-warning btn-lg">Locations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-primary {
        background-color: #007bff !important;
    }

    .card-body {
        background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
</style>
@endpush