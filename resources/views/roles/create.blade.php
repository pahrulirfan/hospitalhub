@extends('layouts.master')

@section('content')
    <div class="col-md-4">
        <div class="vh-100 bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tambah Role</h6>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">Kembali</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Role</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                {{--            <div class="mb-3">--}}
                {{--                <label class="form-label">Permission</label>--}}
                {{--                <div class="row">--}}
                {{--                    @foreach ($permissions as $permission)--}}
                {{--                        <div class="col-md-3">--}}
                {{--                            <div class="form-check">--}}
                {{--                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}">--}}
                {{--                                <label class="form-check-label">--}}
                {{--                                    {{ $permission->name }}--}}
                {{--                                </label>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}
                {{--            </div>--}}

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
