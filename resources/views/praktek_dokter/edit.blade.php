@extends('layouts.master')

@section('content')
    <div class="col-md-8">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Edit Praktek Dokter</h6>
            <form method="POST" action="{{ route('praktek-dokter.update', [$entry->dokter_id, $entry->rumah_sakit_id]) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Dokter</label>
                    <input type="text" class="form-control" value="{{ $entry->dokter->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label>Rumah Sakit</label>
                    <input type="text" class="form-control" value="{{ $entry->rumahSakit->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="jadwal_praktek">Jadwal Praktek</label>
                    <input type="text" name="jadwal_praktek" class="form-control @error('jadwal_praktek') is-invalid @enderror"
                           value="{{ old('jadwal_praktek', $entry->jadwal_praktek) }}">
                    @error('jadwal_praktek') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('praktek-dokter.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
