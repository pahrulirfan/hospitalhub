@extends('layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="mb-0">Manajemen Dokter</h6>
                <a href="{{ route('dokters.create') }}" class="btn btn-primary">Tambah Dokter</a>
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
                        <th>STR</th>
                        <th>JK</th>
                        <th>Spesialisasi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dokters as $i => $d)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->no_str }}</td>
                            <td>{{ $d->jenis_kelamin }}</td>
                            <td>{{ $d->spesialisasi->nama }}</td>
                            <td>
                                <a href="{{ route('dokters.edit', $d->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('dokters.destroy', $d->id) }}" method="POST" class="d-inline form-delete">
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
