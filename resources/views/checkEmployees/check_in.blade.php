<!doctype html>
<html lang="en">

    
    <head>
        
        @include('layouts.head')

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h2 class="text-primary">Listo</h2>
                                            <p>Datos capturados exitosamente</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="p-2">
                                    <div class="avatar-md mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="bx bx-check h1 mb-0 text-primary"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <div class="p-2 mt-4">
                                            <h4>Exito !</h4> <br>
                                            <a href="{{ route('check.employees') }}">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="button">Enviar</button>
                                            </a>
                                        </div>
                                        
                                    </div>

                                </div>
            
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.scripts')

    </body>



</html>
