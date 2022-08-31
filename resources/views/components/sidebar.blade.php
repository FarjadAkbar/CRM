        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @permission('dashboard-access')
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @endpermission
            {{-- <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> --}}
            <!-- Nav Item - Tables -->
            {{-- @role('client') --}}
            {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('chats.index') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Message</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/invoice/' . Auth::user()->id) }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Invoices</span></a>
                </li> --}}
            {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('breif.create') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Project Brief</span></a>
                </li> --}}
            {{-- @endrole --}}

            {{-- @role('admin') --}}
            {{-- @permission('messages-access') --}}
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/messages') }}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Messages</span></a>
            </li>
            {{-- @endpermission --}}


            <!-- Nav Item - Tables -->
            @permission('client-access')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.index') }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Clients</span></a>
                </li>
            @endpermission


            <!-- Nav Item - Tables -->
            @permission('lead-access')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lead.index') }}">
                        <i class="fas fa-fw fa-money-bill-wave"></i>
                        <span>Invoices</span></a>
                </li>
            @endpermission

            {{-- @permission('breif-access') --}}
            <!-- Nav Item - Utilities Collapse Menu -->
            @if (Auth::user()->hasPermission(['brief-access']))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-pager"></i>
                    <span>Breif</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Project Breif:</h6>
                        <a class="collapse-item" href="{{ route('logobreif.index') }}">Logo</a>
                        <a class="collapse-item" href="{{ route('webbreif.index') }}">Web</a>
                    </div>
                </div>
            </li>
            @endif
            {{-- @endpermission --}}


            @permission('add-logobrief')
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logobreif.create') }}">
                        <i class="fas fa-fw fa-pen"></i>
                        <span>Add Logo Breif</span></a>
                </li>
            @endpermission

            @permission('add-webbrief')
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('webbreif.create') }}">
                        <i class="fas fa-fw fa-pen"></i>
                        <span>Add Web Breif</span></a>
                </li>
            @endpermission

            @permission('project-access')
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('project.index') }}">
                        <i class="fas fa-fw fa-project-diagram"></i>
                        <span>Projects</span></a>
                </li>
            @endpermission


            <!-- Nav Item - Tables -->
            @permission('task-access')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('task.index') }}">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Task</span></a>
                </li>
            @endpermission


            <!-- Nav Item - Tables -->
            @permission('subtask-access')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subtask.index') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Subtask</span></a>
                </li>
            @endpermission

            @permission('general-access')
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGeneral"
                        aria-expanded="true" aria-controls="collapseGeneral">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>General</span>
                    </a>
                    <div id="collapseGeneral" class="collapse" aria-labelledby="headingGeneral"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">General Data</h6>
                            <a class="collapse-item" href="{{ route('brand.index') }}">Brands</a>
                            <a class="collapse-item" href="{{ route('category.index') }}">Categories</a>
                            <a class="collapse-item" href="{{ route('package.index') }}">Packages</a>
                        </div>
                    </div>
                </li>
            @endpermission

            {{-- @permission('manage-user') --}}
            <!-- Nav Item - Utilities Collapse Menu -->
            @permission('setting-access')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting"
                    aria-expanded="true" aria-controls="collapseSetting">
                    <i class="fas fa-fw fa-sliders-h"></i>
                    <span>Setting</span>
                </a>
                <div id="collapseSetting" class="collapse" aria-labelledby="headingGeneral"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Settings</h6>
                        <a class="collapse-item" href="{{ route('laratrust.roles-assignment.index') }}">User</a>

                        @role('admin')
                            <a class="collapse-item" href="{{ route('laratrust.roles.index') }}">Roles</a>
                            <a class="collapse-item" href="{{ route('laratrust.permissions.index') }}">Permissions</a>
                        @endrole
                    </div>
                </div>
            </li>
            @endpermission
            {{-- @endpermission --}}

            {{-- @endrole --}}
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
