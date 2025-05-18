<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="{{ route('dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
{{--    <form class="d-none d-md-flex ms-4">--}}
{{--        <input class="form-control border-0" type="search" placeholder="Search">--}}
{{--    </form>--}}
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item" id="logout-btn">Log Out</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
