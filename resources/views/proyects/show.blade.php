@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="row">
            <div class="col-md-5">
                @if (session('info'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                            Acción realizada con exito.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        error! no se pudo realizar la accion.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> --}}
                @endif
            </div>
        </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Detalles del proyecto</h4>
                <div class="text-end">
                    <div class="row btn-group" >
                        <div class="col">
                            <button type="button" class="btn btn-success waves-effect waves-light " id="{{ $project[0]->id }}" data-project='{{ json_encode($project[0]) }}' onclick="editProject({{ $project[0]->id }})" data-bs-toggle="modal" data-bs-target="#modalProject">
                                <i class="bx bxs-pencil label-icon"></i>
                            </button>
                        </div>
                        <form class="deleteProject col" action="{{route('destroyProyect', $project[0]->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash label-icon "></i></button>
                        </form>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">

                        @if($project[0]->image_path != null)
                            <img src="{{asset('images/projects/')}}/{{$project[0]->image_path}}"  alt="" class="avatar-sm">
                        @else
                            <img src="{{asset('images/companies/img-1.png')}}" alt="" class="avatar-sm">
                        @endif

                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">{{$project[0]->name}}</h5>
                        <p class="text-muted">by: {{$project[0]->company}}</p>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Estado</h5>
                        <p class="text-muted"><span class="badge bg-info">Activo</span></p>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Presupuesto</h5>
                        <p class="text-muted">${{$project[0]->budget}}</p>
                    </div>
                </div>
                <h5 class="font-size-15 mt-4">Lider del proyecto:</h5>
                <p class="text-muted">{{$project[0]->leader}}</p>
                <h5 class="font-size-15 mt-4">Descripcion del proyecto:</h5>
                <p class="text-muted">{{$project[0]->description}}</p>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Progreso del proyecto</h4>
                        <div class="">
                            <div class="progress progress-xl">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row task-dates">
                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i>Fecha de inicio</h5>
                            <p class="text-muted mb-0">{{$project[0]->start_date}}</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i>Fecha de Finalizacion</h5>
                            <p class="text-muted mb-0">{{$project[0]->end_date}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Miembros del Proyecto</h4>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($project->users as $user)
                                {{-- @foreach($module->users as $user) --}}
                                    <tr>
                                        <td style="width: 50px;">
                                            <a href=" {{route('showUser', $user->id)}}" class=" text-primary"><img src="{{asset('images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt=""></a>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href=" {{route('showUser', $user->id)}}" class=" text-primary">{{$user->name}}</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                @if($user->pivot->role != null)
                                                    <p class="badge badge-soft-primary font-size-11 m-1">{{$user->pivot->role}}</p>
                                                @else
                                                    <p class="badge badge-soft-primary font-size-11 m-1">Sin asignar</p>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
    
                <h4 class="card-title">Modulos del proyecto</h4>
                <button type="button" class="btn btn-primary waves-effect waves-light btn-label" onclick="createModule()" data-bs-toggle="modal" data-bs-target="#modalModules"><i class="bx bxs-folder-plus label-icon"></i>Crear nuevo Modulo</button>
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Prioridad</th>
                        <th>Proyecto</th>
                        <th>NO.usuarios</th>                     
                        <th>accion</th>
                    </tr>
                    </thead>
    
                    <tbody>
                    @foreach ($project[0]->modules as $module)
                    <tr>
                        <td> 
                            <a class="text-body fw-bold ">
                                <span >{{$module->id}}</span>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('showModules', $module->id)}}" class="text-body fw-bold ">
                                <span class="text-primary">{{$module->name}}</span>
                            </a>
                        </td>

                        <td>
                            <!-- SWITCH PARA ASIGNAR PRIORIDAD -->
                                @switch($module->priority)
                                    @case($module->priority < 4)
                                        <span>Alta</span>
                                        @break
                                    @case($module->priority < 8)
                                        <span>Media</span>
                                        @break
                                    @default
                                        <span>Baja</span>
                                @endswitch
                        </td>    

                        <td>{{$project[0]->name}}</td>
                        <td>{{$project[0]->user_amount}}</td> 
                        <td>   
                            {{-- <div class="row" >
                                <div class="col-6 ">
                                    <button type="button" class="btn btn-success waves-effect waves-light " data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                                        <i class="bx bxs-pencil label-icon"></i>
                                    </button>
                                </div>
                                <div class="col-6 ">
                                    <button onclick="remove()" type="button" class="btn btn-danger waves-effect  waves-light">
                                        <i class="bx bx-trash label-icon "></i> 
                                    </button>
                                </div>
                            </div>                                --}}
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <button class="dropdown-item" id="{{ $module->id }}" data-module='{{ json_encode($module) }}' onclick="editModule({{ $module->id }})" data-bs-toggle="modal" data-bs-target="#modalModules"><i class="bx bxs-pencil label-icon"></i>Editar</button>  
                                    
                                    <form class="eliminar" action="{{route('destroyModule', $module->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item"><i class="bx bx-trash label-icon "></i>Eliminar </button>
                                    </form>

                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
    
            </div>
        </div>
    </div>
    
</div>
<!-- end row -->


{{-- modal --}}
<div>
    
    <!-- sample modal content -->
    <div id="modalModules" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo" class="modal-title" id="myModalLabel">Crear Modulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="formulario" action=" " method="POST">
                        <input type="hidden" id="method" name="_method">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre del modulo" name="name">
                        </div>      

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Prioridad</label>
                            <div class="col-md-10">
                                <select id="priority" class="form-select" name="priority">
                                    <option value="10">Alta</option>
                                    <option value="7">Media</option>
                                    <option value="3">Baja</option>
                                </select>
                            </div>
                        </div>  

                        <input type="hidden" id="project_id" name="project_id" value={{$project[0]->id}}>                                             
                         
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>

                        <input type="hidden" id="id" name="id">
                    </form>

                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div> 
{{-- end modal --}}

{{-- modal --}}
<div>
    <!-- sample modal content -->
    <div id="modalProject" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo" class="modal-title" id="myModalLabel">Editar Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formulario2" action=" " method="POST" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name2" placeholder="Ej: 230802" name="name">
                        </div>                        
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="description" placeholder="Ej: 230802" name="description">
                        </div>
                                                    
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Lider del proyecto</label>
                            <input type="text" class="form-control" id="leader" placeholder="Ej: juanPC" name="leader">
                        </div>                     
                        <div class="row">
                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">compania</label>
                                    <input type="text" class="form-control" id="company" placeholder="Ej: juan perez santos" name="company">
                                </div>
                            </div>
                            
                            <div class="col-md-6">                                  
                                    <div class="mb-4">
                                        <label for="formrow-firstname-input" class="form-label">Numero de usuarios</label>
                                        <input type="text" class="form-control" id="user_amount" placeholder="Ej: juanPC" name="user_amount">
                                    </div>                                 
                            </div>

                            <div class="col-md-6">                                  
                                <div class="mb-4">
                                    <label for="formrow-firstname-input" class="form-label">Presupuesto</label>
                                    <input type="text" class="form-control" id="budget" placeholder="Ej: 50000" name="budget">
                                </div>                                 
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Fecha inicio</label>
                                    <input class="form-control" type="date" id="start_date" name="start_date">
                                </div>
                            </div>
                            
                            <div class="col-md-6">                                  
                                    <div class="mb-4">
                                        <label for="formrow-firstname-input" class="form-label">Fecha fin</label>
                                        <input class="form-control" type="date" id="end_date" name="end_date">
                                    </div>                                 
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Estado</label>
                            <div class="col-md-10">
                                <select class="form-select" id="projectStatus" name="status">
                                    
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Finalizado">Finalizado</option>

                                </select>
                            </div>                        
                        </div> 
                        <div class="col-sm-12">
                            <div class="mt-4">
                                <div>
                                    <label for="formFileLg" class="form-label">Imagen</label>
                                    <input class="form-control form-control-lg" id="image" name="image" type="file">
                                </div>
                            </div>
                        </div>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>

                        <input type="hidden" id="id2" name="id">
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
            $('.deleteProject').submit(function(ev){
                ev.preventDefault();
                swal({
                    title: "Estas seguro?",
                    text: "No podras recuperar el proyecto",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! EL proyecto se elimino con exito!", {
                            icon: "success",
                        });
                        this.submit();
                    } else {
                        swal("El proyecto esta a salvo!");
                    }
                });  
            })
            $('.eliminar').submit(function(e){
                e.preventDefault();
                swal({
                    title: "Estas seguro?",
                    text: "No podras recuperar el modulo",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! EL modulo se elimino con exito!", {
                            icon: "success",
                        });
                        this.submit();
                    } else {
                        swal("El modulo esta a salvo!");
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
            } );
        } );

        function createModule(){

            document.getElementById("id").value = "";
            document.getElementById("name").value = "";
            document.getElementById("priority").value = "";

            //Cambiar url del form
            formulario.setAttribute('action', "{{route('storeModule')}}");
            //Cambiar titulo del modal
            document.getElementById("titulo").innerHTML = "Crear Modulo";
            //Cambiar method del formulario
            document.getElementById("method").value = "POST";

        }

        function editModule(val){

            let boton = document.getElementById(val);
            let module = JSON.parse(boton.getAttribute("data-module"));

            document.getElementById("id").value = module.id;
            document.getElementById("name").value = module.name;

            var valModule = module.priority;
            switch (true) {
                case (valModule < 4):
                    valModule = 3; break;
                case (valModule < 8):
                    valModule = 7; break;
                default:
                    valModule = 10; break;
            }
            document.getElementById("priority").value = valModule;

            //Cambiar url del form
            formulario.setAttribute('action', "{{route('updateModule', '')}}"+"/"+module.id);
            //Cambiar titulo del modal
            document.getElementById("titulo").innerHTML = "Editar Modulo";
            //Cambiar method del formulario
            document.getElementById("method").value = "PUT";

        }

        function editProject(val){

            let boton = document.getElementById(val);
            let project = JSON.parse(boton.getAttribute("data-project"));
            console.log(project);

            document.getElementById("id2").value = project.id;
            document.getElementById("name2").value = project.name;
            document.getElementById("description").value = project.description;
            document.getElementById("company").value = project.company;
            document.getElementById("leader").value = project.leader;
            document.getElementById("user_amount").value = project.user_amount;
            document.getElementById("budget").value = project.budget;
            document.getElementById("projectStatus").value = project.status;
            document.getElementById("start_date").value = project.start_date;
            document.getElementById("end_date").value = project.end_date;
            console.log(project.name);
            //Cambiar url del form
            formulario2.setAttribute('action', "{{route('updateProyect', '')}}"+"/"+project.id);

        }
        </script>

        <!-- Required datatable js -->
        <script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        

        <!-- Sweet Alerts js -->
        <script src="{{asset('libs/sweetalert2/sweetalert2.min.j')}}s"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <!-- Sweet alert init js-->
        <script src="{{asset('js/pages/sweet-alerts.init.js')}}"></script>

          
        <!-- Responsive examples -->
        <script src="{{asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('js/pages/datatables.init.js')}}"></script>    
@endsection