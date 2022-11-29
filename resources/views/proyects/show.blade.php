@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Detalles del proyecto</h4>
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <img src="{{asset('images/companies/img-1.png')}}" alt="" class="avatar-sm">
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
                            @foreach($project[0]->modules as $module)
                                @foreach($module->users as $user)
                                    <tr>
                                        <td style="width: 50px;">
                                            <a href=" {{route('showUser')}}" class=" text-primary"><img src="{{asset('images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt=""></a>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href=" {{route('showUser')}}" class=" text-primary">{{$user->name}}</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="badge badge-soft-info text-primary font-size-11">Frontend</span>
                                                <span class="badge badge-soft-info text-primary font-size-11">UI</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
                <button type="button" class="btn btn-primary waves-effect waves-light btn-label" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-folder-plus label-icon"></i>Crear nuevo Modulo</button>
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
                            <a href="{{route('showModules', $module->id)}}" class="text-body fw-bold ">
                                <span class="text-primary">{{$module->id}}</span>
                            </a>
                        </td>
                        <td>
                            <a href=" " class="text-body fw-bold ">
                                <span >{{$module->name}}</span>
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
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-pencil label-icon"></i>Editar</a>
                                    <a class="dropdown-item" onclick="remove()"><i class="bx bx-trash label-icon "></i>Eliminar </a>
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
    <div id="modalUsuarios" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form>
                        
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: 230802">
                        </div>                        
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: 230802">
                        </div>
                                                    
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Lider del proyecto</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: juanPC">
                        </div>                     
                        <div class="row">
                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">compania</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: juan perez santos">
                                </div>
                            </div>
                            
                            <div class="col-md-6">                                  
                                    <div class="mb-4">
                                        <label for="formrow-firstname-input" class="form-label">Numero de usuarios</label>
                                        <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: juanPC">
                                    </div>                                 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Fecha inicio</label>
                                    <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                                </div>
                            </div>
                            
                            <div class="col-md-6">                                  
                                    <div class="mb-4">
                                        <label for="formrow-firstname-input" class="form-label">Fecha fin</label>
                                        <input class="form-control" type="date" value="2020-07-18" id="example-date-input">
                                    </div>                                 
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Estado</label>
                            <div class="col-md-10">
                                <select class="form-select">
                                    <option>Select</option>
                                    <option>Pendiente</option>
                                    <option>Finalizado</option>
                                    <option>cancelado</option>

                                </select>
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
<!-- end row -->
    
@endsection

@section('scripts')
        <script type="text/javascript">
            function remove(id) {
            swal({
                title: "Estas seguro?",
                text: "No podras recuperar el proyecto",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! EL proyecto se elimino con exito!", {
                icon: "success",
                });
            } else {
                swal("El proyecto esta a salvo!");
            }
            });  
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