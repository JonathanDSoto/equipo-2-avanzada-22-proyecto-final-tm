<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication">usuarios</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html" key="t-login">Usuarios</a></li>
                        <li><a href="auth-login-2.html" key="t-login-2">Perfil</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{route('users')}}" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication">Usuarios</span>
                    </a>
                </li>                
                <li>
                    <a href=" {{ route('proyect') }} " class="waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span key="t-authentication">Proyectos</span>
                    </a>
                </li>
                <li>
                    <a href=" {{ route('authCheck') }} " class="waves-effect">
                        <i class="bx bx-task"></i>
                        <span key="t-file-manager">Checador</span>
                    </a>
                </li>
                <li>
                    <a href=" {{route('report')}}" class="waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager">Reportes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('calendar')}}" class="waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-file-manager">Calendarios</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>