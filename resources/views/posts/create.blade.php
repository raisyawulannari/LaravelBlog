@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="padding-left: 50px; padding-right: 15px;">
        <div class="row">
            <div class="col-md-8">

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
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <!-- Tombol Kembali sesuai dengan template -->
                        <a href="{{ route('posts.index') }}" class="text-reset text-muted">
                            <u><i class="fa fa-chevron-left"></i> Kembali</u>
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Brand Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required placeholder="Enter title here">

                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Publish Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="content" class="form-label">Content (Image)</label>
                                <input type="file" id="content" class="form-control @error('content') is-invalid @enderror" name="content">

                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Enter description here">{{ old('description') }}</textarea>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div
        </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhb

        @endsection