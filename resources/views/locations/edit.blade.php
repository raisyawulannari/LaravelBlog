@extends('layouts.main')

@section('content')
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
                    Edit Location
                </div>
                <div class="card-body">
                    <form action="{{ route('locations.update', $location->location_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Input city -->
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $location_id->city) }}" required>

                            <!-- error message untuk city -->
                            @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Input country -->
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', $location_id->country) }}" required>
                            <!-- error message untuk country -->
                            @error('country')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Input address -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $location->address) }}">

                            <!-- error message untuk address -->
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                            <!-- error message untuk jobs -->
                            @error('jobs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Buttons: Submit and Back -->
                        <button type="submit" class="btn btn-primary">Update Location</button>
                        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Back</a>
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
@endsection