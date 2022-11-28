@extends('layouts.app')

@section('contenido')

<div class="row">
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-md">
                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                <a href="{{ route('showReport')}}" class="text-dark"> 
                                    <img src="{{asset('images/companies/img-1.png')}}" alt="" height="30"> 
                                </a>
                                
                            </span>
                        </div>
                    </div>
                    

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15"><a href="{{ route('showReport')}}"  class="text-dark">Facebook 2</a></h5>
                        <p class="text-muted mb-4">por META</p>
                        <p class="fw-light">Miembros</p>
                        <div class="avatar-group">
                            <div class="avatar-group-item">
                                <a href="{{route('showUser')}}" class="d-inline-block">
                                    <img src="{{asset('images/users/avatar-4.jpg')}}" alt="" class="rounded-circle avatar-xs">
                                </a>
                            </div>
                            <div class="avatar-group-item">
                                <a href="{{route('showUser')}}" class="d-inline-block">
                                    <img src="{{asset('images/users/avatar-5.jpg')}}" alt="" class="rounded-circle avatar-xs">
                                </a>
                            </div>
                            <div class="avatar-group-item">
                                <a href="{{route('showUser')}}" class="d-inline-block">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                            A
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="avatar-group-item">
                                <a href="{{route('showUser')}}" class="d-inline-block">
                                    <img src="{{asset('images/users/avatar-2.jpg')}}" alt="" class="rounded-circle avatar-xs">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 border-top">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item me-3">
                        <span class="badge bg-success">Completo</span>
                    </li>
                    <li class="list-inline-item me-3">
                        <i class= "bx bx-calendar me-1"></i> 15 Oct, 19 
                    </li>
                    
                    <li class="list-inline-item me-3">
                        <i class= "bx bx-calendar me-1"></i> 15 Oct, 22
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">estados </h4>
                <span class="badge badge-soft-success">Finalizado</span>
                <span class="badge badge-soft-warning">Pendiente</span>
                <span class="badge badge-soft-danger">Cancelado</span>
                <span class="badge badge-soft-info">Aprobado</span>
                <h4 class="card-title">alertas</h4>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                        accion realizada con exito.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    error! no se pudo realizar la accion.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
               
            </div>
        </div>
    </div>  
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Example</h4>
                <form class="repeater" enctype="multipart/form-data">
                    <div data-repeater-list="group-a">
                        <div data-repeater-item class="row">
                            <div  class="col-4">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" name="untyped-input" class="form-control" placeholder="Nombre de usuario"/>
                            </div>

                            <div class="col-4">
                                <label >ROL</label>
                                <select id="formrow-inputState" class="form-select">
                                    <option selected="">Elige...</option>
                                    <option>QA</option>
                                    <option>Maquetador</option>
                                    <option>...</option>
                                </select>
                            </div>
                            
                            <div class="col-4 ">
                                <div class="d-grid">
                                    <label >Accion</label>
                                    <input data-repeater-delete type="button" class="btn btn-primary" value="Delete"/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Añadir usuario"/>
                </form>
            </div>
        </div>
    </div> 
</div>
<!-- end row -->

{{-- <div class="row">
    <div class="col-lg-12">
        <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
            <li class="page-item disabled">
                <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
            </li>
            <li class="page-item">
                <a href="javascript: void(0);" class="page-link">1</a>
            </li>
            <li class="page-item active">
                <a href="javascript: void(0);" class="page-link">2</a>
            </li>
            <li class="page-item">
                <a href="javascript: void(0);" class="page-link">3</a>
            </li>
            <li class="page-item">
                <a href="javascript: void(0);" class="page-link">4</a>
            </li>
            <li class="page-item">
                <a href="javascript: void(0);" class="page-link">5</a>
            </li>
            <li class="page-item">
                <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
            </li>
        </ul>
    </div>
</div> --}}
    
@endsection

@section('scripts')
    <script src="{{asset('libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('js/pages/form-repeater.int.js')}}"></script>
@endsection