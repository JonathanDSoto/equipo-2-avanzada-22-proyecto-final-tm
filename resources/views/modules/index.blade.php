@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-12">
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
                        <th>accion</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php ($i = 0)
                        @foreach ($modules as $module)
                            <tr>
                                <td> 
                                    @php ($i++) {{$i}}
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

                                <td>
                                    <a href="{{route('showProyect', $module->project_id)}}" class="text-body fw-bold ">
                                        <span class="text-primary">{{$module->project->name}}</span>
                                    </a>
                                </td>

                                <td style="width: 200px">   
                                    <div class="row" >
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
    <div id="modalUsuarios" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form>
                        
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Nombre del modulo">
                        </div>                        
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Prioridad</label>
                            <div class="col-md-10">
                                <select class="form-select">
                                    <option>Select</option>
                                    <option>Alta</option>
                                    <option>Media</option>
                                    <option>Baja</option>

                                </select>
                            </div>
                        </div>  
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Encargado del modulo</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Nombre del encargado">
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
            text: "No podras recuperar el modulo",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Poof! EL modulo se elimino con exito!", {
            icon: "success",
            });
        } else {
            swal("El modulo esta a salvo!");
        }
        });  
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
