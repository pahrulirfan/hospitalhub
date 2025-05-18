@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <div class="bg-light p-4 rounded">
            <h6 class="mb-4">Edit Dokter</h6>

            <form action="{{ route('dokters.update', $dokter->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $dokter->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label>No STR</label>
                    <input type="text" name="no_str" class="form-control @error('no_str') is-invalid @enderror"
                           value="{{ old('no_str', $dokter->no_str) }}" required>
                    @error('no_str')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <div>
                        <label><input type="radio" name="jenis_kelamin" value="L"
                                {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                            Laki-laki</label>
                        <label class="ms-3"><input type="radio" name="jenis_kelamin" value="P"
                                {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                            Perempuan</label>
                    </div>
                    @error('jenis_kelamin')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control"
                           value="{{ old('tanggal_lahir', $dokter->tanggal_lahir) }}">
                    @error('tanggal_lahir')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label>Spesialisasi</label>
                    <select name="spesialisasi_id" class="form-select @error('spesialisasi_id') is-invalid @enderror">
                        <option value="">-- Pilih Spesialisasi --</option>
                        @foreach($spesialisasis as $sp)
                            <option value="{{ $sp->id }}"
                                {{ old('spesialisasi_id', $dokter->spesialisasi_id) == $sp->id ? 'selected' : '' }}>
                                {{ $sp->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('spesialisasi_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('dokters.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
