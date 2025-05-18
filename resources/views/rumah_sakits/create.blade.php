@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <div class="bg-light p-4 rounded">
            <h6 class="mb-4">Tambah Rumah Sakit</h6>

            <form action="{{ route('rumah_sakits.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" required>
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror"
                           value="{{ old('kota') }}">
                    @error('kota')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                           value="{{ old('telepon') }}">
                    @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('rumah_sakits.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
