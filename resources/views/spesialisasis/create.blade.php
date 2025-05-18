@extends('layouts.master')

@section('content')
    <div class="col-md-8">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Tambah Spesialisasi</h6>
            <form method="POST" action="{{ route('spesialisasis.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Spesialisasi</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required>
                    @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('spesialisasis.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
