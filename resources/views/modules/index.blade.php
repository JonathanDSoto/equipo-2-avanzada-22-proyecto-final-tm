@extends('layouts.app')
<!-- Sweet Alert-->
<link href="{{asset('libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@section('contenido')

<div class="row">
    <div class="col-12">
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
                        <th>accion</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td> 
                                    <a class="text-body fw-bold ">
                                        <span>{{$module->id}}</span>
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
                                            <span>Baja</span>
                                            @break
                                        @case($module->priority < 8)
                                            <span>Media</span>
                                            @break
                                        @default
                                            <span>Alta</span>
                                    @endswitch
                                </td>

                                <td>
                                    <a href="{{route('showProyect', $module->project_id)}}" class="text-body fw-bold ">
                                        <span class="text-primary">{{$module->project->name}}</span>
                                    </a>
                                </td>

                                <td style="width: 200px">   
                                    <div class="row" >
                                        <div class="col-4">
                                            <button type="button" class="btn btn-success waves-effect waves-light " id="{{ $module->id }}" data-module='{{ json_encode($module) }}' onclick="editModule({{ $module->id }})" data-bs-toggle="modal" data-bs-target="#modalModules">
                                                <i class="bx bxs-pencil label-icon"></i>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <form class="eliminar" action="{{route('destroyModule', $module->id)}}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash label-icon "></i></button>
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
                            <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                        </div>      

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Prioridad</label>
                            <div class="col-md-10">
                                <select id="priority" class="form-select" name="priority" required>
                                    <option value="10">Alta</option>
                                    <option value="7">Media</option>
                                    <option value="3">Baja</option>
                                </select>
                            </div>
                        </div>  

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Proyecto</label>

                            <select id="project_id" class="form-select" name="project_id" required>   
                                @foreach($modules as $module)
                                    <option value="{{$module->project->id}}">{{$module->project->name}}</option>
                                @endforeach
                            </select>

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

        function createModule(){

            document.getElementById("id").value = "";
            document.getElementById("name").value = "";
            document.getElementById("priority").value = "";
            document.getElementById("project_id").value = "";

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

            document.getElementById("project_id").value = module.project_id;

            //Cambiar url del form
            formulario.setAttribute('action', "{{route('updateModule', '')}}"+"/"+module.id);
            //Cambiar titulo del modal
            document.getElementById("titulo").innerHTML = "Editar Modulo";
            //Cambiar method del formulario
            document.getElementById("method").value = "PUT";

        }

    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        
        <!-- Responsive examples -->
        <script src="{{asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('js/pages/datatables.init.js')}}"></script>    
@endsection