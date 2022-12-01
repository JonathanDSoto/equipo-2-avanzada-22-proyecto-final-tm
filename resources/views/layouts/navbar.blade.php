<div id="layout-wrapper">

            
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="" class="logo-light mt-4">
                        <span >
                            <img src="https://play-lh.googleusercontent.com/bgFXLigJP65KdRcSlkYh4tFsYhG5g8cSSeCzQLEhoU2UBlnH_wKsThXcvPffaGsQ5E4" alt="" height="40">
                            <h5>CHECADOR</h5>
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                

                
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('images/users/avatar-1.jpg')}}"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::User()?->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('showUser', Auth::User()?->id)}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Perfil</span></a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Cerrar sesion</span></button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>
