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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <img src="{{asset('images/companies/img-1.png')}}" alt="" class="avatar-sm">
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Modulo:<p class="text-muted">{{$module[0]->name}}</p></h5>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Prioridad:</h5>

                        <!-- SWITCH PARA ASIGNAR PRIORIDAD -->
                        @switch($module[0]->priority)
                            @case($module[0]->priority < 4)
                                <span class="badge badge-soft-info">Baja</span>
                                @break
                            @case($module[0]->priority < 8)
                                <span class="badge badge-soft-info">Media</span>
                                @break
                            @default
                                <span class="badge badge-soft-info">Alta</span>
                        @endswitch
                        
                    </div>
                    <div class="row btn-group" >
                        <div class="col">
                            <button type="button" class="btn btn-success waves-effect waves-light " id="{{ $module[0]->id }}" data-Module='{{ json_encode($module[0]) }}' onclick="editModule({{ $module[0]->id }})" data-bs-toggle="modal" data-bs-target="#modalModules">
                                <i class="bx bxs-pencil label-icon"></i>
                            </button>
                        </div>
                        <form class="deleteModule col" action="{{ route('destroyModule', $module[0]->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash label-icon "></i></button>
                        </form>
                    </div>
                </div>
                
                <div>
                    <button type="button" class="btn btn-primary waves-effect waves-light btn-label" onclick="addUser()" data-bs-toggle="modal" data-bs-target="#modalUser"><i class="bx bxs-folder-plus label-icon"></i>Asignar usuario</button>
                </div>

                <h5 class="font-size-15 mt-4">Usuarios del modulo :</h5>

                <table class="table align-middle mb-0">
        
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Avance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @if($module[0]->users->count() != 0)
                        @foreach($module[0]->users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>
                                    @if($user->pivot->role != null)
                                        <p class="badge badge-soft-primary font-size-11 m-1">{{$user->pivot->role}}</p>
                                    @else
                                        <p class="badge badge-soft-primary font-size-11 m-1">Sin asignar</p>
                                    @endif
                                </td>

                                <td>{{$user->pivot->percentage_advance}}%</td>

                                <td>
                                    <a type="button" href=" {{route('showUser', $user->id)}}" class="btn btn-light btn-sm">Detalles</a>
                                </td>                       
                            </tr>  
                        @endforeach  
                    @else
                            <tr>
                                <th scope="row"> Nada que mostrar por aquí </th>                     
                            </tr>  
                    @endif

                    </tbody>
                </table>
                
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Progreso del modulo</h4>

                        @if($module[0]->users->count() != 0)
                            @foreach($module[0]->users as $user)
                                <div class="">
                                    <div class="progress progress-xl">
                                        <div class="progress-bar" role="progressbar" style="width: {{$user->pivot->percentage_advance}}%;" aria-valuenow="{{$user->pivot->percentage_advance}}" aria-valuemin="0" aria-valuemax="100">{{$user->pivot->percentage_advance}}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                                <div class="">
                                    <div class="progress progress-xl">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>
                
                <div class="row task-dates">
                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Fecha de inicio</h5>
                            <p class="text-muted mb-0">

                            @if($module[0]->project->start_date != null)
                                {{$module[0]->project->start_date}}
                            @else
                                TBE
                            @endif

                            </p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Fecha de finalizacion</h5>
                            <p class="text-muted mb-0">

                            @if($module[0]->project->end_date != null)
                                {{$module[0]->project->end_date}}
                            @else
                                TBE
                            @endif

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->


    <!-- end col -->
</div>
<!-- end row -->

{{-- modal --}}
<div>
    
    <!-- sample modal content -->
    <div id="modalModules" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo" class="modal-title" id="myModalLabel">Editar Modulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="formulario" action="{{route('updateModule', $module[0]->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nameM" placeholder="Nombre del modulo" name="name">
                        </div>      

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Prioridad</label>
                            <div class="col-md-10">
                                <select id="priority" class="form-select" name="priority">
                                    <option value="10">Baja</option>
                                    <option value="7">Media</option>
                                    <option value="3">Alta</option>
                                </select>
                            </div>
                        </div>  

                        <input type="hidden" id="project_id" name="project_id" value={{$module[0]->project->id}}>                                             
                         
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>

                        <input type="hidden" id="idM" name="id">
                    </form>

                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- sample modal content -->
    <div id="modalUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo" class="modal-title" id="myModalLabel">Añadir usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="formulario" action="{{route('attachUser')}}" method="POST">
                        @csrf   

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Usuario</label>
                            <div class="col-md-10">
                                <select id="priority" class="form-select" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div> 

                        <div class="mb-3">
                            <div class="col-md-10">
                                <select id="role" class="form-select" name="role">
                                    <option value="Backend">Backend</option>
                                    <option value="Frontend">Frontend</option>
                                    <option value="Maquetador">Maquetador</option>
                                    <option value="QA">QA</option>
                                    <option value="Fullstack">Fullstack</option>
                                </select>
                            </div>
                        </div>  

                        <input type="hidden" id="module_id" name="module_id" value={{$module[0]->id}}>  
                        <input type="hidden" id="percentage_advance" name="percentage_advance" value=0>                                        
                         
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
        $('.deleteModule').submit(function(e){
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
        function editModule(val){

            let boton = document.getElementById(val);
            let module = JSON.parse(boton.getAttribute("data-Module"));

            document.getElementById("idM").value = module.id;
            document.getElementById("nameM").value = module.name;

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
            console.log(module.id);

        }
    </script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('libs/sweetalert2/sweetalert2.min.j')}}s"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Sweet alert init js-->
    <script src="{{asset('js/pages/sweet-alerts.init.js')}}"></script>
@endsection