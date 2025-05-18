@extends('layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="bg-light rounded p-4">
            <div class="d-flex justify-content-between mb-3">
                <h6>Daftar Praktek Dokter</h6>
                <a href="{{ route('praktek-dokter.create') }}" class="btn btn-primary">Tambah Praktek</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Dokter</th>
                    <th>Rumah Sakit</th>
                    <th>Jadwal</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($praktek as $p)
                    <tr>
                        <td>{{ $p->dokter->nama }}</td>
                        <td>{{ $p->rumahSakit->nama }}</td>
                        <td>{{ $p->jadwal_praktek }}</td>
                        <td>
                            <a href="{{ route('praktek-dokter.edit', [$p->dokter_id, $p->rumah_sakit_id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('praktek-dokter.destroy', [$p->dokter_id, $p->rumah_sakit_id]) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
