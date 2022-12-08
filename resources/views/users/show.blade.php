@extends('layouts.app')

@section('contenido')
            @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                    Acción realizada con exito.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                error! no se pudo realizar la accion.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
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
                            <div class="ms-2 text-end ">
                                <div class="row btn-group mt-2" >
                                    <div class="col-5">
                                        <button type="button" class="btn btn-success waves-effect waves-light " id="{{ $user->id }}" data-user='{{ json_encode($user) }}' onclick="editUser({{  $user->id }})" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                                            <i class="bx bxs-pencil label-icon"></i>
                                        </button>
                                    </div>
                                    <form class="eliminarUs col-1" action="{{route('deleteUser',  $user->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash label-icon "></i></button>
                                    </form>
                                </div>
                            </div>
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
                                        @if($user->avatar!=null)
                                            <img src="{{asset('images/users/')}}/{{$user->avatar}}" alt="" class="img-thumbnail rounded-circle">
                                        @else
                                            <img src="{{asset('images/users/avatar-1.jpg')}}" alt="" class="img-thumbnail rounded-circle">
                                        @endif
                                        
                                    </div>
                                    <h5 class="mt-2 font-size-15 text-truncate">{{$user->username}}</h5>
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
                            <h4 class="card-title">Usuarios</h4>
                            <button type="button" onclick="createUser()" class="btn btn-primary waves-effect waves-light btn-label" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-user-plus label-icon"></i>Crear usuario</button>
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Proyecto</th>
                                        <th scope="col">Compañia</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha de inicio</th>
                                        <th scope="col">Detalles</th>
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
                                                <a href=" {{route('showProyect', $project->id)}}" type="button" class="btn btn-primary waves-effect waves-light"><i class="bx bx-show"></i></a>
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

{{-- modal --}}
<div>
    <!-- sample modal content -->
    <div id="modalUsuarios" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo">Crear nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="formularioU" action=" " method="POST" enctype='multipart/form-data'>
                        <input type="hidden" id="method" name="_method">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" id="formrow-firstname-input" placeholder="Ej: Daniel" maxlength="50" onkeypress="return soloLetras(event)" required>
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Usuario</label>
                                    <input type="text"  name="username" id="username" class="form-control" id="formrow-firstname-input" placeholder="Ej: juanPC" maxlength="50" onkeypress="return soloLetrasynumeros(event)" required>
                                </div>                                
                            </div>
                        </div>
    
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" id="formrow-email-input" placeholder="Ej: ejemplo@gmail.com" maxlength="50" onkeypress="return soloLetrasynumeros(event)" required>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" id="formrow-password-input" placeholder="************" required>
                                </div>
                            </div>  
                        </div>    
                       
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputZip" class="form-label">Telefono</label>
                                <input class="form-control" type="tel" value="" id="phone" name="phone" placeholder="ej: 6121072052" id="phone" maxlength="10" onkeypress="return solonumeros(event)" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion</label>
                            <div>
                                <textarea id="address" name="address" class="form-control" rows="3" maxlength="100" onkeypress="return soloLetrasnumerosygato(event)" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">NSS</label>
                            <input type="text" class="form-control" id="NSS" name="NSS" id="formrow-firstname-input" placeholder="Ej: 90806083439" maxlength="10" onkeypress="return solonumeros(event)" required>
                        </div>       
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Posicion</label>
                            <input type="text" class="form-control" name="position" id="position" id="formrow-firstname-input" placeholder="Ej: Jefe" maxlength="50" onkeypress="return soloLetras(event)" required>
                        </div>  
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Salario</label>
                            <input type="text" class="form-control"  id="salary" name='salary' id="formrow-firstname-input" placeholder="Ej: 8900" maxlength="50" onkeypress="return solonumeros(event)" required>
                        </div> 
                          <div class="mb-3" >
                            <label for="formrow-firstname-input" class="form-label">Token</label>
                            <input type="text" class="form-control" id="verify_code" name='verify_code' placeholder="Ej: 230802" maxlength="4" onkeypress="return solonumeros(event)" required>
                        </div>   
                        <div class="col-sm-12">
                            <div class="mt-4">
                                <div>
                                    <label for="formFileLg" class="form-label">Large file input example</label>
                                    <input class="form-control form-control-lg" id="avatar" name="avatar" type="file">
                                </div>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>
                    </form>

                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div> 
{{-- end modal --}}
    
@endsection

@section('scripts')
    <script type="text/javascript">
           $('.eliminarUs').submit(function(e){
                e.preventDefault();
                swal({
                    title: "Estas seguro?",
                    text: "No podras recuperar el usuario",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! EL usuario se elimino con exito!", {
                        icon: "success",
                    });
                    this.submit();
                } else {
                    swal("El usuario esta a salvo!");
                }
            });  
        })

        $(document).ready(function() {
            $('#datatable').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "search": "Buscar:",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "emptyTable": "Sin datos para mostrar",
                }
            });
        });

        function editUser(val){
            let boton = document.getElementById(val);
            let user = JSON.parse(boton.getAttribute('data-user'));

            document.getElementById("name").value = user.name;
            document.getElementById("username").value = user.username;
            document.getElementById("phone").value = user.phone;
            document.getElementById("email").value = user.email;
            document.getElementById("NSS").value = user.NSS;
            document.getElementById("address").value = user.address;
            document.getElementById("salary").value = user.salary;
            document.getElementById("position").value = user.position;
        
            formularioU = document.getElementById('formularioU');
            formularioU.setAttribute('action', "{{route('updateUser', '')}}"+"/"+user.id);
            document.getElementById("titulo").innerHTML = "Editar Usuario";
            document.getElementById("method").value = "PUT";
            document.getElementById('verify_code').disabled = true;
            document.getElementById('password').disabled = true;
        
        }

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

    <!-- Sweet Alerts js -->
    <script src="{{asset('libs/sweetalert2/sweetalert2.min.j')}}s"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Sweet alert init js-->
    <script src="{{asset('js/pages/sweet-alerts.init.js')}}"></script>


    <!-- Required datatable js -->
    <script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{asset('js/pages/datatables.init.js')}}"></script>

@endsection