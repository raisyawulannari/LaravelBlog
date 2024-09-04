@extends('layouts.main')
@section('content')



<div class="container" style="padding-left: 60px; padding-right: 0px;">
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
            <div class="main-content" style="padding-top: 0;>
                    <div class=" container-fluid">
                <section>
                    <div class="py-2 mb-4">
                        <h1 class="">Post</h1>
                        <nav class="breadcrumb-nav d-flex">
                            <h6 class="breadcrumb-text mb-0">
                                <a href="{{ route('posts.index') }}" class="text-reset">Home</a>
                                <span>/</span>
                                <a href="" class="text-reset"><u>post</u></a>
                            </h6>
                        </nav>
                    </div>
                    <!-- Card layout -->
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-server" class="table table-hover table-striped nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Brand Title</th>
                                            <th>Status</th>
                                            <th>Content</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $index => $post)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->status == 0 ? 'Draft':'Publish' }}</td>
                                            <td class="text-center">
                                                @if ($post->content)
                                                <img src="{{ asset('storage/' . $post->content) }}" class="rounded" style="width: 60px; height: auto;" alt="Content Image">
                                                @else
                                                No Image
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center text-muted" colspan="6">Post data not available</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
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