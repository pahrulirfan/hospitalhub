@extends('layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="mb-0">Manajemen Spesialisasi</h6>
                <a href="{{ route('spesialisasis.create') }}" class="btn btn-primary">Tambah Spesialisasi</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($spesialisasis as $i => $s)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>
                                <a href="{{ route('spesialisasis.edit', $s->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('spesialisasis.destroy', $s->id) }}" method="POST" class="d-inline form-delete">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
