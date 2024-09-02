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
                        Edit Post
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Input title -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title', $post->title) }}" required>

                                <!-- error message untuk title -->
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Dropdown status -->
                            <div class="form-group">
                                <label for="status">Publish Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" {{ $post->status == 1 ? 'selected':'' }}>Publish</option>
                                    <option value="0" {{ $post->status == 0 ? 'selected':'' }}>Draft</option>
                                </select>
                            </div>

                            <!-- Input for content image -->
                            <div class="form-group">
                                <label for="content">Content (Image)</label>
                                @if($post->content && \Storage::disk('public')->exists($post->content))
                                <!-- Display existing image -->
                                <img src="{{ \Storage::disk('public')->url($post->content) }}" alt="Content Image" class="img-thumbnail mb-2" style="max-width: 200px;">
                                @endif
                                <input type="file" id="content" class="form-control @error('content') is-invalid @enderror" name="content">

                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Buttons: Submit and Back -->
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
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