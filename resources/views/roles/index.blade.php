@extends('layouts.master')

@section('content')
    <div class="col-md-4">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Data Role</h6>
                <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Tambah Role</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Role</th>
                        {{--                    <th>Permission</th>--}}
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            {{--                        <td>{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</td>--}}
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                      class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
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
