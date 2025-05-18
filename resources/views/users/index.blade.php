@extends('layouts.master')

@section('content')
    <div class="col-md-8">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Manajemen User</h6>
                <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah User</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $i => $user)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                            <td>
                                {{-- Jika admin, tampilkan tombol edit & delete untuk semua --}}
                                @if (auth()->user()->hasRole('admin'))
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                          class="d-inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>

                                    {{-- Jika user biasa, hanya bisa edit dirinya sendiri --}}
                                @elseif (auth()->id() == $user->id)
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
