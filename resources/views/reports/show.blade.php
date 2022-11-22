@extends('layouts.app')

@section('contenido')


<!-- end page title -->

<div class="row">   
    
        <div class="card">
            
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Reporte del proyecto</h4>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <img src="{{asset('images/companies/img-1.png')}}" alt="" class="avatar-sm">
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">Facebook 2</h5>
                        <p class="text-muted">por META</p>
                    </div>
                </div>
                
                <div class="row">
                    <h5 class="font-size-15 mt-4">detalles del proyecto :</h5>
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-soft-secondary waves-effect waves-light">Exportar PDF</button>
                    </div>
                    
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Modulos</h4>
                                
                                <div id="column_chart" data-colors='["--bs-success","--bs-primary", "--bs-danger"]' class="apex-charts" dir="ltr"></div>                                      
                            </div>
                        </div><!--end card-->
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Horas de trabajo</h4>                                
                                <div id="bar_chart" data-colors='["--bs-success"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div><!--end card-->
                    </div>
                </div>
                
                <div class="row task-dates">
                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> fecha de inicio</h5>
                            <p class="text-muted mb-0">08 Sept, 2019</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> fecha de finalizacion</h5>
                            <p class="text-muted mb-0">12 Oct, 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

    <!-- end col -->
</div>
<!-- end row -->
    
@endsection

@section('scripts')
         <!-- apexcharts -->
        <script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- apexcharts init -->
        <script src="{{asset('js/pages/apexcharts.init.js')}}"></script>
@endsection