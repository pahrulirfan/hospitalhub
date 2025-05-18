@extends('layouts.master')

@section('content')
    <div class="col-md-8">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Manajemen Rumah Sakit</h6>
                <a href="{{ route('rumah_sakits.create') }}" class="btn btn-primary mb-3">Tambah Rumah Sakit</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rumahSakits as $i => $rs)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $rs->nama }}</td>
                            <td>{{ $rs->alamat }}</td>
                            <td>{{ $rs->kota }}</td>
                            <td>{{ $rs->telepon }}</td>
                            <td>
                                <a href="{{ route('rumah_sakits.edit', $rs->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('rumah_sakits.destroy', $rs->id) }}" method="POST" class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
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
