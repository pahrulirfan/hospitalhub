<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>HospitalHub</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <span></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ set_active('dashboard') }}"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('rumah_sakits.index') }}"
               class="nav-item nav-link {{ set_active('rumah_sakits.index') }}">
                <i class="fa fa-hospital me-2"></i>Rumah Sakit
            </a>
            <a href="{{ route('dokters.index') }}" class="nav-item nav-link  {{ set_active('dokters.index') }}">
                <i class="fa fa-hospital me-2"></i>Dokter
            </a>
            <a href="{{ route('spesialisasis.index') }}"
               class="nav-item nav-link  {{ Request::is('spesialisasi*') ? 'active':'' }}">
                <i class="fa fa-hospital me-2"></i>Spesialisasi
            </a>
            <a href="{{ route('praktek-dokter.index') }}"
               class="nav-item nav-link  {{ Request::is('praktek-dokter*') ? 'active':'' }}">
                <i class="fa fa-hospital me-2"></i>Praktek Dokter
            </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ set_active(['roles.index', 'users.index']) }}"
                   data-bs-toggle="dropdown">
                    {{--                    {{ set_active(['products.index', 'products.create'], 'menu-open') }}--}}
                    <i class="far fa-file-alt me-2"></i>Setting</a>
                <div class="dropdown-menu bg-transparent border-0">
                    @role('admin')
                    <a href="{{ route('users.index') }}"
                       class="dropdown-item {{ set_active('users.index') }}">Users</a>
                    <a href="{{ route('roles.index') }}"
                       class="dropdown-item {{ set_active('roles.index') }}">Roles</a>
                    @endrole
                </div>
            </div>
        </div>
    </nav>
</div>
