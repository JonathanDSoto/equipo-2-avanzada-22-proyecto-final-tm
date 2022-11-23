<!doctype html>
<html lang="en">

    
    <head>
        
        @include('layouts.head')

    </head>

    <body>
        <!-- end account-pages -->
        <div class="account-pages my-5 pt-sm-5 ">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">CHECADOR</h5>
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
                                            <label for="userpassword">Token de usuario</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Escriba su token aqui">
                                        </div>
            
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Listo</button>
                                        </div>
        
                                    </form>
                                </div>
            
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
                                            
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Center modal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <a href=" {{route('check_in.employees')}}" class="btn btn-primary w-md waves-effect waves-light" type="submit">Registrar entrada</a>
                            </div>
                            <div class="col-6">
                                <a href=" {{route('check_out.employees')}}" class="btn btn-primary w-md waves-effect waves-light" type="submit">Registrar salida</a>
                            </div>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <!-- JAVASCRIPT -->
        @include('layouts.scripts')

    </body>



</html>
