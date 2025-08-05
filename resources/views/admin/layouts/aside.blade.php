<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">

                <img src="{{ asset("storage/uploads/" . $settings["SETTING_SITE_LOGO"]) }}" class="w-75" alt="">

            </div>
            <h6 class="sidebar-brand-text mx-3 mt-2 font-weight-bold" title=" sc-edu-bd.com"> sc-edu-bd.com</h6>
        </a>
    </li>


    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

        <li class="nav-item {{
            request()->routeIs("sliders.index") ||
            request()->routeIs("sliders.create") ||
            request()->routeIs("sliders.show") ||
            request()->routeIs("sliders.edit")
            ? "active" : "" }}">
            <a class="nav-link" href="{{ route("sliders.index") }}">
                <i class="fas fa-fw fa-tablet"></i>
                <span>Sliders</span>
            </a>
        </li>

    <li class="nav-item {{ request()->routeIs('setting.index') || request()->routeIs('setting.update') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('setting.index') }}">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>

  <li class="nav-item }}
        request()->routeIs('abouts.index') ||
        request()->routeIs('abouts.create') ||
        request()->routeIs('abouts.show') ||
        request()->routeIs('abouts.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('abouts.index') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>About</span>
        </a>
    </li>

     <li class="nav-item }}
        request()->routeIs('teacher.index') ||
        request()->routeIs('teacher.create') ||
        request()->routeIs('teacher.show') ||
        request()->routeIs('teacher.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('teacher.index') }}">
             <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Teacher</span>
        </a>
    </li>



     <li class="nav-item }}
        request()->routeIs('gallery.index') ||
        request()->routeIs('gallery.create') ||
        request()->routeIs('gallery.show') ||
        request()->routeIs('gallery.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('gallery.index') }}">
             <i class="fas fa-fw fa-photo-video"></i>
            <span>Gallery</span>
        </a>
    </li>

       <li class="nav-item }}
        request()->routeIs('class.index') ||
        request()->routeIs('class.create') ||
        request()->routeIs('class.show') ||
        request()->routeIs('class.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('class.index') }}">
             <i class="fas fa-fw fa-school"></i>

            <span>class</span>
        </a>
    </li>

    <li class="nav-item }}
        request()->routeIs('admission.index') ||
        request()->routeIs('admission.create') ||
        request()->routeIs('admission.show') ||
        request()->routeIs('admission.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admission.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Online Admission</span>
        </a>

    </li>



    <li class="nav-item }}
        request()->routeIs('student.index') ||
        request()->routeIs('student.create') ||
        request()->routeIs('student.show') ||
        request()->routeIs('student.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('student.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Student Info</span>
        </a>

    </li>


    <li class="nav-item }}
        request()->routeIs('notice.index') ||
        request()->routeIs('notice.create') ||
        request()->routeIs('notice.show') ||
        request()->routeIs('notice.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('notice.index') }}">
            <i class="fas fa-bullhorn"></i>
            <span>Notice </span>
        </a>

    </li>



    <li class="nav-item }}
        request()->routeIs('result.index') ||
        request()->routeIs('result.create') ||
        request()->routeIs('result.show') ||
        request()->routeIs('result.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('result.index') }}">
            <i class="fas fa-graduation-cap"></i>
            <span>Result </span>
        </a>

    </li>


    <li class="nav-item {{
    request()->routeIs("blogs.index") ||
    request()->routeIs("blogs.create") ||
    request()->routeIs("blogs.show") ||
    request()->routeIs("blogs.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("blogs.index") }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Blogs</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs("events.index") ||
    request()->routeIs("events.create") ||
    request()->routeIs("events.show") ||
    request()->routeIs("events.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("events.index") }}">
            <i class="fas fa-fw fa-list-ol"></i>
            <span>Events</span>
        </a>
    </li>


</ul>
