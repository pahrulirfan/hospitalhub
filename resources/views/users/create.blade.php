@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="mb-0">Tambah User</h6>
                <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Kembali</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input class="form-control" type="text" name="name" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" required value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input class="form-control" type="password" name="password_confirmation" required>
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="roles[]" class="form-select" required>
                        @foreach ($roles as $role)
                            <option
                                value="{{ $role->name }}" {{ $role->name == old('roles') ? 'selected':'' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
