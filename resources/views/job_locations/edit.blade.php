@extends('layouts.main')

@section('content')

<div class="container" style="padding-left: 60px; padding-right: 0px;">
    <!-- Notifikasi menggunakan flash session data -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <!-- Form Edit Job Location -->
    <div class="card border-0 shadow rounded">
        <div class="card-header">
            <h1 class="mb-0">Edit Job Location</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('job_locations.update', $jobLocation->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Dropdown Job -->
                <div class="mb-3">
                    <label for="job_id" class="form-label">Job</label>
                    <select name="job_id" id="job_id" class="form-select @error('job_id') is-invalid @enderror" required>
                        <option value="" disabled {{ old('job_id', $jobLocation->job_id) ? '' : 'selected' }}>Select Job</option>    
                        @foreach($jobs as $job)
                            <option value="{{ $job->id }}" {{ $job->id == $jobLocation->job_id ? 'selected' : '' }}>
                                {{ $job->activity_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('job_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <!-- Dropdown Location -->
                <div class="mb-3">
                    <label for="location_id" class="form-label">Location</label>
                    <select name="location_id" id="location_id" class="form-select @error('location_id') is-invalid @enderror" required>
                        <option value="" disabled {{ old('location_id', $jobLocation->location_id) ? '' : 'selected' }}>Select Location</option>    
                        @foreach($locations as $location)
                            <option value="{{ $location->location_id }}" {{ $location->location_id == $jobLocation->location_id ? 'selected' : '' }}>
                                {{ $location->address }}
                            </option>
                        @endforeach
                    </select>
                    @error('location_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <!-- Buttons -->
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('job_locations.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
