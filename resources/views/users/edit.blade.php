@extends('layouts.master')

@section('content')
    <div class="col-md-4">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="mb-0">Edit User</h6>
                <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Kembali</a>
            </div>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="password">Password (kosongkan jika tidak diubah)</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="roles[]" class="form-select" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
