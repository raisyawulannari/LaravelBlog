@extends('layouts.main')

@section('content')

<body>
    <div class="container" style="padding-left: 51px; padding-right: 15px;">
        <div class="row">
            <div class="col-md-12">

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

                <!-- Card layout -->
                <div class="card">
                    <div class="card-header">
                        Edit Job
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input platform -->
                            <div class="form-group">
                                <label for="platform">Platform</label>
                                <input type="text" id="platform" name="platform" class="form-control @error('platform') is-invalid @enderror" value="{{ old('platform', $job->platform) }}" required>

                                <!-- error message untuk platform -->
                                @error('platform')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Input activity_name -->
                            <div class="form-group">
                                <label for="activity_name">Activity Name</label>
                                <input type="text" id="activity_name" name="activity_name" class="form-control @error('activity_name') is-invalid @enderror" value="{{ old('activity_name', $job->activity_name) }}" required>

                                <!-- error message untuk platform -->
                                @error('activity_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <!-- Input description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $job->description) }}</textarea>

                                <!-- error message untuk description -->
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Input deadline -->
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="datetime-local" id="deadline" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline', $job->deadline->format('Y-m-d\TH:i')) }}" required>

                                <!-- error message untuk deadline -->
                                @error('deadline')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Dropdown post -->
                            <div class="form-group">
                                <label for="post_id">Post</label>
                                <select id="post_id" name="post_id" class="form-control @error('post_id') is-invalid @enderror" required>
                                    @foreach ($posts as $post)
                                    <option value="{{ $post->id }}" {{ $job->post_id == $post->id ? 'selected' : '' }}>
                                        {{ $post->title }}
                                    </option>
                                    @endforeach
                                </select>

                                <!-- error message untuk post_id -->
                                @error('post_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Buttons: Submit and Back -->
                            <button type="submit" class="btn btn-primary">Update Job</button>
                            <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Include necessary JS libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .dataTables_paginate .paginate_button {
            margin-right: 10px;
        }
    </style>
</body>

@endsection