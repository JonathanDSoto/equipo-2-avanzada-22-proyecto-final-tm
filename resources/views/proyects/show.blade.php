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
                        <h5 class="text-truncate font-size-15">Facebook 2</h5>
                        <p class="text-muted">by: META</p>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Estado</h5>
                        <p class="text-muted"><span class="badge bg-info">Activo</span></p>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Presupuesto</h5>
                        <p class="text-muted">$1000000</p>
                    </div>
                </div>
                <h5 class="font-size-15 mt-4">Lider del proyecto:</h5>
                <p class="text-muted">Mark zukaritas</p>


                <h5 class="font-size-15 mt-4">Descripcion del proyecto:</h5>

                <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc,</p>

                
                <div class="row task-dates">
                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Fecha de inicio</h5>
                            <p class="text-muted mb-0">08 Sept, 2019</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Fecha de Finalizacion</h5>
                            <p class="text-muted mb-0">12 Oct, 2019</p>
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
                <h4 class="card-title mb-4">Miembros del equipo</h4>

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
                            <tr>
                                <td style="width: 50px;">
                                    <a href=" {{route('showUser')}}" class=" text-primary"><img src="{{asset('images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt=""></a>
                                    
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href=" {{route('showUser')}}" class=" text-primary">Daniel Canales</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <span class="badge badge-soft-info text-primary font-size-11">Frontend</span>
                                        <span class="badge badge-soft-info text-primary font-size-11">UI</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px;">
                                    <a href=" {{route('showUser')}}" class=" text-primary"><img src="{{asset('images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt=""></a>
                                    
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href=" {{route('showUser')}}" class=" text-primary">Daniel Canales</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <span class="badge badge-soft-info text-primary font-size-11">Frontend</span>
                                        <span class="badge badge-soft-info text-primary font-size-11">UI</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px;">
                                    <a href=" {{route('showUser')}}" class=" text-primary"><img src="{{asset('images/users/avatar-2.jpg')}}" class="rounded-circle avatar-xs" alt=""></a>
                                    
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0"><a href=" {{route('showUser')}}" class=" text-primary">Daniel Canales</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <span class="badge badge-soft-info text-primary font-size-11">Frontend</span>
                                        <span class="badge badge-soft-info text-primary font-size-11">UI</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Modulos</h4>
                <a type="button" href=" {{route('modules')}}"  class="btn btn-soft-info waves-effect waves-light">Mas informacion</a>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Prioridad</th>    
                                <th>Avance</th>                       
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 50px;">
                                    <h5 class="font-size-14 m-0 text-primary"><a href=" {{route('showModules')}}" class="text-dark ">#1</a></h5>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0 text-primary"><a href=" {{route('showModules')}}" class=" text-primary">Modulo 1</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <span class="badge badge-soft-info text-primary font-size-11">Alta</span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0 text-muted"> 100%</h5>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px;">
                                    <h5 class="font-size-14 m-0 text-primary"><a href=" {{route('showModules')}}" class="text-dark ">#1</a></h5>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0 text-primary"><a href=" {{route('showModules')}}" class=" text-primary">Modulo 1</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <span class="badge badge-soft-info text-primary font-size-11">Alta</span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0 text-muted"> 100%</h5>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50px;">
                                    <h5 class="font-size-14 m-0 text-primary"><a href=" {{route('showModules')}}" class="text-dark ">#1</a></h5>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0 text-primary"><a href=" {{route('showModules')}}" class=" text-primary">Modulo 1</a></h5>
                                </td>
                                <td>
                                    <div>
                                        <span class="badge badge-soft-info text-primary font-size-11">Alta</span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="font-size-14 m-0 text-muted"> 100%</h5>
                                </td>
                            </tr> 
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->


</div>
<!-- end row -->
    
@endsection

@section('scripts')
 
@endsection