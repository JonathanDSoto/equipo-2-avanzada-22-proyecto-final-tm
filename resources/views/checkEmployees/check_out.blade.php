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
                                            <h5 class="text-primary">Chacador de salida</h5>
                                            <p>Escriba su Token de usuario</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="p-2">
                                    <form action="">
                                        <div class="mb-3">
                                            <label for="userpassword">Proyecto</label>
                                            <div class="col-md-10">
                                                <select class="form-select">
                                                    <option>Select</option>
                                                    <option>Pendiente</option>
                                                    <option>Finalizado</option>
                                                    <option>cancelado</option>
                
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword">Modulo</label>
                                            <div class="col-md-10">
                                                <select class="form-select">
                                                    <option>Select</option>
                                                    <option>Pendiente</option>
                                                    <option>Finalizado</option>
                                                    <option>cancelado</option>
                
                                                </select>
                                            </div>  
                                        </div> 
                                        <div class="col-xl-12">
                                            <div class="p-3">
                                                <h5 class="font-size-14 mb-3">Porcentaje de avance</h5>
                                                <input type="text" id="range_01">
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="{{route('check_in.employees')}}">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="button">Enviar</button>
        
                                            </a>
                                        </div>
        
                                    </form>
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
