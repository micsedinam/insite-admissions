<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('student/home') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IMC SIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('student/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Course Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        @php 
            $registered = App\Models\Registered::where('user_id', Auth::id())->first(); 
            $profile = App\Models\Profile::where('user_id', Auth::id())->first();
        @endphp
                                
        @if ($registered->semester == $profile->semester && $registered->level == $profile->level && $registered->user_id == $profile->user_id )
            <a class="nav-link register-course" href="{{route('export.courses')}}">
                <i class="fas fa-fw fa-archive"></i>
                <span>My Courses</span>    
            </a>
        @else
            <a class="nav-link register-course" href="#">
                <i class="fas fa-fw fa-archive"></i>
                <span>Register Courses</span>    
            </a>
        @endif
        
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-archive"></i>
            <span>Applications</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admission Details:</h6>
                <a class="collapse-item" href="{{url('admin/applications')}}">Review Applications</a>
                <a class="collapse-item" href="{{url('admin/status/change')}}">Status Update</a>
                <a class="collapse-item" href="{{url('admin/reviewed/applications')}}">Reviewed Applications</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Department Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/department')}}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Departments</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Programme Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/programme')}}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Programmes</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/admin-register')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>