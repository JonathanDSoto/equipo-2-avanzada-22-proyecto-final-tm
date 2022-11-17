@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Usuarios</h4>
                <button type="button" class="btn btn-primary waves-effect waves-light btn-label" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-user-plus label-icon"></i>Crear usuario</button>
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>telefono</th>
                        <th>Direccion</th>
                        <th>NSS</th>
                        <th>Posision</th>
                        <th>Salario</th>                        
                        <th>accion</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>das</td>
                        <td>$320,800</td>
                        <td>          
                            <button type="button" class="btn btn-success waves-effect waves-light btn-label" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-pencil label-icon">
                                </i>Editar usuario
                            </button>
                            <button type="button" class="btn btn-danger waves-effect btn-label waves-light">
                                <i class="bx bx-trash label-icon "></i> eliminar
                            </button>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Crear nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form>
                        <div class="row">

                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: juan perez santos">
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: juanPC">
                                </div>                                
                            </div>
                        </div>
    
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="formrow-email-input" placeholder="Ej: ejemplo@gmail.com">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="formrow-password-input" placeholder="************">
                                </div>
                                
                            </div>
                        </div>    
                       
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputZip" class="form-label">Telefono</label>
                                <input class="form-control" type="tel" value="" placeholder="ej: 6121072052" id="phone">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion</label>
                            <div>
                                <textarea required="" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">NSS</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: 90806083439">
                        </div>       
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Posicion</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: 90806083439">
                        </div>  
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Salario</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: 8900">
                        </div> 
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Token</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Ej: 230802">
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