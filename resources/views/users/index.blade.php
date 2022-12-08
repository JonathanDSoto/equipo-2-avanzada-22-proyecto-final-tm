@extends('layouts.app')
     <!-- Sweet Alert-->
     <link href="{{asset('libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@section('contenido')

<div class="row">
    
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
 
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Usuarios</h4>
                <button type="button" onclick="createUser()" class="btn btn-primary waves-effect waves-light btn-label" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-user-plus label-icon"></i>Crear usuario</button>
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Telefono</th>
                        <th>NSS</th>
                        <th>Posición</th>
                        <th>Salario</th>                        
                        <th>Accion</th>
                    </tr>
                    </thead>

                    <tbody>
                @foreach ($users as $user)
                    
               
                    <tr>
                        <td>
                            <a href=" {{route('showUser', $user->id)}}" class="text-body fw-bold "> 
                                <span class="text-primary">{{$user->name}}</span>
                            </a>
                        </td>
                     
                        <td>{{$user->username}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->NSS}}</td>
                        <td>{{$user->position}}</td>
                        <td>${{$user->salary}}</td>
                            <td>          
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item" href="{{route('showUser', $user->id)}}"><i class="bx bxs-info-circle label-icon">Detalles</i> </a>
                                        <button class="dropdown-item" id="{{ $user->id }}" data-user='{{ json_encode($user) }}' onclick="editUser({{ $user->id }})" data-bs-toggle="modal" data-bs-target="#modalUsuarios"><i class="bx bxs-pencil label-icon"></i>Editar</button>
                                        <form class="eliminarU" action="{{route('deleteUser', $user->id)}}" method="POST">
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
                                    <input type="text" name="name" id="name" class="form-control" id="formrow-firstname-input" placeholder="Ej: juan perez santos">
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Usuario</label>
                                    <input type="text"  name="username" id="username" class="form-control" id="formrow-firstname-input" placeholder="Ej: juanPC">
                                </div>                                
                            </div>
                        </div>
    
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" id="formrow-email-input" placeholder="Ej: ejemplo@gmail.com">
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" id="formrow-password-input" placeholder="************">
                                </div>
                            </div>  
                        </div>    
                       
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputZip" class="form-label">Telefono</label>
                                <input class="form-control" type="tel" value="" id="phone" name="phone" placeholder="ej: 6121072052" id="phone">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direccion</label>
                            <div>
                                <textarea id="address" name="address" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">NSS</label>
                            <input type="text" class="form-control" id="NSS" name="NSS" id="formrow-firstname-input" placeholder="Ej: 90806083439">
                        </div>       
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Posicion</label>
                            <input type="text" class="form-control" name="position" id="position" id="formrow-firstname-input" placeholder="Ej: 90806083439">
                        </div>  
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Salario</label>
                            <input type="text" class="form-control"  id="salary" name='salary' id="formrow-firstname-input" placeholder="Ej: 8900">
                        </div> 
                          <div class="mb-3" >
                            <label for="formrow-firstname-input" class="form-label">Token</label>
                            <input type="text" class="form-control" id="verify_code" name='verify_code' placeholder="Ej: 230802">
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
           $('.eliminarU').submit(function(e){
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

        function createUser(){

            document.getElementById("name").value = "";
            document.getElementById("username").value = "";
            document.getElementById("phone").value = "";
            document.getElementById("email").value = "";
            document.getElementById("password").value = "";
            document.getElementById("NSS").value = "";
            document.getElementById("address").value = "";
            document.getElementById("salary").value = "";
            document.getElementById("position").value = "";
            document.getElementById("verify_code").value = "";
    
            //Cambiar url del form
            formularioU.setAttribute('action', "{{route('storeUser')}}");
            //Cambiar titulo del modal
            document.getElementById("titulo").innerHTML = "Crear Usuario";
            //Cambiar method del formulario
            document.getElementById("method").value = "POST";

            document.getElementById('verify_code').disabled = false;
            document.getElementById('password').disabled = false;

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