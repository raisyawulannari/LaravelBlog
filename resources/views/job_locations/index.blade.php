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

    <div class="main-content" style="padding-top: 0;">
        <div class="container-fluid">
            <section>
                <div class="py-2 mb-4">
                    <h1 class="">Job Locations</h1>
                    <nav class="breadcrumb-nav d-flex">
                        <h6 class="breadcrumb-text mb-0">
                            <a href="{{ route('job_locations.index') }}" class="text-reset">Home</a>
                            <span>/</span>
                            <a href="" class="text-reset"><u>Job Locations</u></a>
                        </h6>
                    </nav>
                </div>

                <!-- Card layout -->
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('job_locations.create') }}" class="btn btn-primary">Create New Job Location</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-server" class="table table-hover table-striped nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Job</th>
                                        <th>Location</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($jobLocations as $index => $jobLocation)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $jobLocation->job->activity_name }}</td>
    <td>
        @if($jobLocation->location)
            {{ $jobLocation->location->address }}</td>
        @else
            <span class="text-muted">No location found</span>
        @endif
    </td>
    <td class="text-center">
        <a href="{{ route('job_locations.edit', $jobLocation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('job_locations.destroy', $jobLocation->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No job locations found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Tambahkan CSS custom untuk menambah jarak antar tombol pagination -->
<style>
    .dataTables_paginate .paginate_button {
        margin-right: 10px;
        /* Menambahkan margin di kanan tombol pagination */
    }
</style>

<!-- Include DataTables JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap5.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('#datatable-server').DataTable({
            responsive: true
        });
    });
</script>
@endsection
