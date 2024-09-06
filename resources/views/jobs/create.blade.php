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

    <!-- Form Create Job -->
    <div class="card border-0 shadow rounded">
        <div class="card-header">
            <h1 class="mb-0">Create New Job</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('jobs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="activity_name" class="form-label">Activity Name</label>
                    <input type="text" class="form-control @error('activity_name') is-invalid @enderror" id="activity_name" name="activity_name" value="{{ old('activity_name') }}">
                    @error('activity_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="platform" class="form-label">Platform</label>
                    <input type="text" class="form-control @error('platform') is-invalid @enderror" id="platform" name="platform" value="{{ old('platform') }}">
                    @error('platform')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="datetime-local" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}">
                    @error('deadline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="post_id" class="form-label">Post</label>
                    <select class="form-select @error('post_id') is-invalid @enderror" id="post_id" name="post_id">
                        <option value="">Select a Post</option>
                        @foreach ($posts as $post)
                        <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                            {{ $post->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('post_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Job</button>
            </form>
        </div>
    </div>
</div>

@endsection