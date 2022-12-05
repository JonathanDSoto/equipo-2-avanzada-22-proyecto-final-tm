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
                                    <h5 class="font-size-15 text-truncate">{{$user->username}}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{$user->position}}</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">
                                       
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">{{$user->projects->count()}}</h5>
                                                <p class="text-muted mb-0">Proyectos</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">{{$user->salary}}</h5>
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
                            <h4 class="card-title mb-4">Infomación de contacto</h4>

                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nombre :</th>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telefono :</th>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Correo :</th>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NSS :</th>
                                            <td>{{$user->NSS}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Direccion :</th>
                                            <td>{{$user->address}}</td>
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
                                            <h4 id="allProjects" class="mb-0">0</h4>
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
                                            <h4 id="pendignProjects" class="mb-0">0</h4>
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
                                            <h4 id="totalHours" class="mb-0">0 hrs</h4>
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
                                            <th scope="col">Compañia</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha de inicio</th>
                                            <th scope="col">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->projects as $project)
                                            <tr>
                                                <th>{{$project->id}}</th>
                                                <td>{{$project->name}}</td>
                                                <td>{{$project->company}}</td>
                                                <td>{{$project->status}}</td>
                                                <td>{{$project->start_date}}</td>
                                                <td>
                                                    <a href=" {{route('showProyect', $project->id)}}" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <i class="mdi mdi-folder-information font-size-16 align-middle me-2"></i> Detalles
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach                                      
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
    <script type="text/javascript">
        function loadInfo(){

            <?php 
                $allProjects=0;
                $pendingsProjects=0; 
                $allhours=0;
            ?>
            <?php $allhours+=$user->total_hours_worked; ?>
            @foreach ($user->projects as $project)
                @if ($project->status=="Finalizado")
                    <?php $allProjects+=1; ?>
                @endif
                @if($project->status=="Pendiente")
                    <?php $pendingsProjects+=1; ?>
                @endif
            @endforeach
            //Cambiar total de proyectos terminados
            document.getElementById("allProjects").innerHTML = "{{$allProjects}}";
            //Cambiar total de proyectos pendientes
            document.getElementById("pendignProjects").innerHTML = "{{$pendingsProjects}}";
             //Cambiar total de horas
            document.getElementById("totalHours").innerHTML = "{{$allhours}} hrs";
            console.log('sexo');
        }
    </script>
@endsection