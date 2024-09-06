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
                    <h1 class="">Locations</h1>
                    <nav class="breadcrumb-nav d-flex">
                        <h6 class="breadcrumb-text mb-0">
                            <a href="{{ route('locations.index') }}" class="text-reset">Home</a>
                            <span>/</span>
                            <a href="" class="text-reset"><u>Locations</u></a>
                        </h6>
                    </nav>
                </div>

                <!-- Card layout -->
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('locations.create') }}" class="btn btn-primary">Add New Location</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-server" class="table table-hover table-striped nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>Jobs</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($locations as $index => $location)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $location->city }}</td>
                                        <td>{{ $location->country }}</td>
                                        <td>{{ $location->address }}</td>
                                        
                                        <td class="text-center">
                                            <a href="{{ route('locations.edit', $location->location_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('locations.destroy', $location->location_id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                            </form> 
                                        </td>
                                    </tr> 
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No locations found</td>
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