@extends('layouts.app')
            <!-- Sweet Alert-->
            <link href="{{asset('libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@section('contenido')

    <div class="row">
        <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium mb-2">Proyectos completos</p>
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
                            <p class="text-muted fw-medium mb-2">Total de proyectos</p>
                            <h4 class="mb-0">200</h4>
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
                    <button type="button" class="btn btn-primary waves-effect waves-light btn-label" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-folder-plus label-icon"></i>Crear nuevo proyecto</button>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Compania</th>
                            <th>Jefe</th>
                            <th>Presupuesto</th>
                            <th>Cantidad de usuarios</th>
                            <th>Estado</th>
                            <th>Fecha de inicio</th> 
                            <th>Fecha finalizacion</th>                       
                            <th>accion</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td> 
                                <a href=" {{route('showProyect')}}" class="text-body fw-bold ">
                                    <span class="text-primary">Proyectito</span>
                                </a>
                            </td>
                            <td>no es un proyecto es "EL proyecto"</td>
                            <td>BUGisoft</td>
                            <td>Brundo "god" Alejandro</td>
                            <td>$1000000000</td>
                            <td>69</td>
                            <td>activo</td>
                            <td>2020</td>
                            <td>Pendiente</td>
                            <td>
                                <div class="row">
                                    <div class="col-4 ">
                                        <a href=" {{route('showProyect')}}"  type="button" class="btn btn-warning waves-effect waves-light ">
                                            <i class="bx bxs-info-circle label-icon"></i> 
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                                            <i class="bx bxs-pencil label-icon"></i>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button onclick="remove()" type="button" class="btn btn-danger waves-effect waves-light" >
                                            <i class="bx bx-trash label-icon "></i> 
                                        </button>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> 

    {{-- modal --}}
    <div>
        <!-- sample modal content -->
        <div id="modalUsuarios" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Proyecto</h5>
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