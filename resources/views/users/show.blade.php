@extends('layouts.app')

@section('contenido')

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Detalles usuario</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{asset('images/users/avatar-1.jpg')}}" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">Daniel Zamago</h5>
                                    <p class="text-muted mb-0 text-truncate">Backend</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">
                                       
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">2</h5>
                                                <p class="text-muted mb-0">Proyectos</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Salario</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Infomacion de contacto</h4>

                            <p class="text-muted mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                            </p>
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nombre :</th>
                                            <td>Cynthia Price</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telefono :</th>
                                            <td>(123) 123 1234</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">E-mail :</th>
                                            <td>cynthiaskote@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                </div>         
                
                <div class="col-xl-8">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-2">Proyectos completados</p>
                                            <h4 class="mb-0">125</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-check-circle font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-2">Proyectos pendientes</p>
                                            <h4 class="mb-0">12</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-hourglass font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-2">Total de horas trabajadas</p>
                                            <h4 class="mb-0">240 hrs</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-time font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Mis proyectos</h4>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Proyecto</th>
                                            <th scope="col">Modulo</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Porcentaje de avance</th>
                                            <th scope="col">Fecha de inicio</th>
                                            <th scope="col">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Facebook 2</td>
                                            <td>Perfiles</td>
                                            <td>QA</td>
                                            <td>01%</td>
                                            <td>30/02/2020</td>
                                            <td>
                                                <a href=" {{route('showProyect')}}" type="button" class="btn btn-primary waves-effect waves-light">
                                                    <i class="mdi mdi-folder-information font-size-16 align-middle me-2"></i> Detalles
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td>proyecton</td>
                                            <td>Perfiles</td>
                                            <td>QA</td>
                                            <td>50%</td>
                                            <td>20/10/2010</td>
                                            <td>
                                                <a href=" {{route('showProyect')}}" type="button" class="btn btn-primary waves-effect waves-light">
                                                    <i class="mdi mdi-folder-information font-size-16 align-middle me-2"></i> Detalles
                                                </a>
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    
@endsection

@section('scripts')
 
@endsection