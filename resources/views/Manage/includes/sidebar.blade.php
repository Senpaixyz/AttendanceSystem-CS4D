<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-gradient-default " id="sidenav-main" aria-hidden="true">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                {{-- {{ Config::get('settings.site_name') }} --}}
                <h2 class="text-white">SMCL<br><small>Attendance System</small></h2>
            </a>
        </div>
        <hr class="my-1">
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                
                <ul class="navbar-nav">
  
                    @if(Auth::user()->role == "Admin")
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fa fa-home text-lightviolet"></i>
                                <span class="nav-link-text">Home</span>
                            </a>
                        </li>

                        <!-- Heading -->
                        <h6 class="navbar-heading py-3 text-white">
                            <span class="docs-normal">Other Options</span>
                        </h6>
                        <!-- End Heading -->
                        <!-- Action -->
                        <!-- Add Students -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/student*')) ? 'active' : '' }}" href="{{ route('student.index') }}">
                                <i class="fas fa-users-class text-lightviolet"></i>
                                <span class="nav-link-text">Students List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/teacher*')) ? 'active' : '' }}" href="{{ route('teacher.index') }}">
                                <i class="fa fa-male text-lightviolet"></i>
                                <span class="nav-link-text">Teachers List</span>
                            </a>
                        </li>

                        {{-- <!-- Add Courses -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/subject*')) ? 'active' : '' }}" href="{{ route('subject.index') }}">
                                <i class="fas fa-book-open text-lightviolet"></i>
                                <span class="nav-link-text">Subjects</span>
                            </a>
                        </li>
                        <!-- End Courses -->
                        <!-- Add Attendance -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/attendance*')) ? 'active' : '' }}" href="{{ route('attendance.index') }}">
                                <i class="fas fa-calendar-alt text-lightviolet"></i>
                                <span class="nav-link-text">Attendance</span>
                            </a>
                        </li>
 --}}



                        
                    @elseif(Auth::user()->role == 'User')
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/teacher-dashboard')) ? 'active' : '' }}" href="{{ route('teacher-dashboard') }}">
                                <i class="ni ni-tv-2 text-lightviolet"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>

                        <!-- Heading -->
                        <h6 class="navbar-heading py-3 text-white">
                            <span class="docs-normal">Actions</span>
                        </h6>
                        <!-- End Heading -->
                        <!-- Action -->
                        <!-- Add Students -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/student-list*')) ? 'active' : '' }}" href="{{ route('student-list.index') }}">
                                <i class="fas fa-users-class text-lightviolet"></i>
                                <span class="nav-link-text">Students</span>
                            </a>
                        </li>

                         <!-- Add Courses -->
                         <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/view-subjects*')) ? 'active' : '' }}" href="{{ route('view-subjects.index') }}">
                                <i class="fas fa-book-open text-lightviolet"></i>
                                <span class="nav-link-text">Subjects</span>
                            </a>
                        </li>
                        <!-- Add Attendance -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/set-attendance*')) ? 'active' : '' }}" href="{{ route('set-attendance.index') }}">
                                <i class="fas fa-calendar-alt text-lightviolet"></i>
                                <span class="nav-link-text">Attendance</span>
                            </a>
                        </li>


    

                            
                    @endif


                    
                    <!-- End Attendance -->
                    <!-- Add Attendance -->
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ (request()->is('manage/setting*')) ? 'active' : '' }}" href="{{ route('settings.index') }}">
                            <i class="ni ni-settings text-primary"></i>
                            <span class="nav-link-text">Setting</span>
                        </a>
                    </li> --}}
                    <!-- End Attendance -->
                    <!-- End Action -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                            <i class="ni ni-user-run text-lightviolet"></i>
                            <span class="nav-link-text">Logout</span>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
 
            </div>
        </div>
    </div>
</nav>
