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

                    @foreach($module[0]->users as $user)
                        <tr>
                            <th scope="row">{{$module[0]->id}}</th>
                            <td>{{$module[0]->name}}</td>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>
                                <p  class="badge badge-soft-primary font-size-11 m-1">QA</p>
                            </td>
                            <td>
                                10%
                            </td>
                            <td>
                                <a type="button" href=" {{route('showUser')}}" class="btn btn-light btn-sm">Detalles</a>
                            </td>                       
                        </tr>  
                    @endforeach      

                    </tbody>
                </table>
                
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Progreso del modulo</h4>

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


<!-- end row -->
    
@endsection

@section('scripts')
 
@endsection