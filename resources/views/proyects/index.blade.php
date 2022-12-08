@extends('layouts.app')
            <!-- Sweet Alert-->
            <link href="{{asset('libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
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
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium mb-2">Proyectos completos</p>
                            <h4 id="projectsComplete" class="mb-0">0</h4>
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
                            <h4 id="projectsPending" class="mb-0">0</h4>
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
                            <p class="text-muted fw-medium mb-2">Total de proyectos</p>
                            <h4 class="mb-0">{{$projects->count()}}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                <span class="avatar-title">
                                    <i class="bx bx-folder font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Proyectos</h4>
                    <button type="button" class="btn btn-primary waves-effect waves-light btn-label" onclick="createProject()" data-bs-toggle="modal" data-bs-target="#modalProject"><i class="bx bxs-folder-plus label-icon"></i>Crear nuevo proyecto</button>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th class="col-3">Nombre</th>
                                <th>Compañia</th>
                                <th>Presupuesto</th>
                                <th>Estado</th>
                                <th>Fecha finalizacion</th>                       
                                <th>accion</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($projects as $project)
                                <tr>
                                    <td> 
                                        <a href="{{route('showProyect', $project->id)}}" class="text-body fw-bold ">
                                            <span class="text-primary">{{$project->name}}</span>
                                        </a>
                                    </td>
                                    <td>{{$project->company}}</td>
                                    <td>${{$project->budget}}</td>
                                    <td>{{$project->status}}</td>
                                    <td>{{$project->end_date}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                <a class="dropdown-item" href="{{route('showProyect', $project->id)}}"><i class="bx bxs-info-circle label-icon">Detalles</i> </a>
                                                <button class="dropdown-item" id="{{ $project->id }}" data-project='{{ json_encode($project) }}' onclick="editProject({{ $project->id }})" data-bs-toggle="modal" data-bs-target="#modalProject"><i class="bx bxs-pencil label-icon"></i>Editar</button>   
                                                <form class="eliminar" action="{{route('destroyProyect', $project->id)}}" method="POST">
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
        </div> <!-- end col -->
    </div> 

    {{-- modal --}}
    <div>
        <!-- sample modal content -->
        <div id="modalProject" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="titulo" class="modal-title" id="myModalLabel">Crear Proyecto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formulario" action=" " method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="method" name="_method">
                            @csrf
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" placeholder="Ej: 230802" name="name">
                            </div>                        
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="description" placeholder="Ej: 230802" name="description">
                            </div>
                                                        
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Líder del proyecto</label>
                                <input type="text" class="form-control" id="leader" placeholder="Ej: juanPC" name="leader">
                            </div>                     
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Compañia</label>
                                        <input type="text" class="form-control" id="company" placeholder="Ej: juan perez santos" name="company">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">                                  
                                        <div class="mb-4">
                                            <label for="formrow-firstname-input" class="form-label">NO. de usuarios</label>
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

                                <div class="col-sm-12">
                                    <div class="mt-4">
                                        <div>
                                            <label for="formFileLg" class="form-label">Imagen</label>
                                            <input class="form-control form-control-lg" id="image" name="image" type="file">
                                        </div>
                                    </div>
                                </div>                      
                            </div> 
                            
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
    
    
@endsection

@section('scripts')
        <script type="text/javascript">
            $('.eliminar').submit(function(e){
                e.preventDefault();
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

            function editProject(val){

                let boton = document.getElementById(val);
                let project = JSON.parse(boton.getAttribute("data-project"));
                console.log(project);

                document.getElementById("id").value = project.id;
                document.getElementById("name").value = project.name;
                document.getElementById("description").value = project.description;
                document.getElementById("company").value = project.company;
                document.getElementById("leader").value = project.leader;
                document.getElementById("user_amount").value = project.user_amount;
                document.getElementById("budget").value = project.budget;
                document.getElementById("projectStatus").value = project.status;
                document.getElementById("start_date").value = project.start_date;
                document.getElementById("end_date").value = project.end_date;
                console.log(project.id);
                //Cambiar url del form
                formulario.setAttribute('action', "{{route('updateProyect', '')}}"+"/"+project.id);
                //Cambiar titulo del modal
                document.getElementById("titulo").innerHTML = "Editar Proyecto";
                //Cambiar method del formulario
                document.getElementById("method").value = "PUT";

            }
            function createProject(){

                document.getElementById("id").value = "";
                document.getElementById("name").value = "";
                document.getElementById("description").value = "";
                document.getElementById("company").value = "";
                document.getElementById("leader").value = "";
                document.getElementById("user_amount").value = "";
                document.getElementById("budget").value = "";
                document.getElementById("projectStatus").value = "";
                document.getElementById("start_date").value = "";
                document.getElementById("end_date").value = "";

                //Cambiar url del form
                formulario.setAttribute('action', "{{route('storeProject')}}");
                //Cambiar titulo del modal
                document.getElementById("titulo").innerHTML = "Crear Proyecto";
                //Cambiar method del formulario
                document.getElementById("method").value = "POST";

            }
            function loadInfo(){

                <?php 
                    $allProjects=0;
                    $pendingsProjects=0; 
                ?>
                @foreach ($projects as $project)
                    @if ($project->status=="Finalizado")
                        <?php $allProjects+=1; ?>
                    @endif
                    @if($project->status=="Pendiente")
                        <?php $pendingsProjects+=1; ?>    
                    @endif
                @endforeach
                //Cambiar total de proyectos terminados
                document.getElementById("projectsComplete").innerHTML = "{{$allProjects}}";
                //Cambiar total de proyectos pendientes
                document.getElementById("projectsPending").innerHTML = "{{$pendingsProjects}}";
                
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