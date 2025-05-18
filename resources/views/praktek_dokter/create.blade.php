@extends('layouts.master')

@section('content')
    <div class="col-md-8">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Tambah Praktek Dokter</h6>
            <form method="POST" action="{{ route('praktek-dokter.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="dokter">Dokter</label>
                    <select name="dokter_id" class="form-control" required>
                        @foreach($dokters as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="rs">Rumah Sakit</label>
                    <select name="rumah_sakit_id" class="form-control" required>
                        @foreach($rumahSakits as $rs)
                            <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jadwal">Jadwal Praktek</label>
                    <input type="text" name="jadwal_praktek" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('praktek-dokter.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
