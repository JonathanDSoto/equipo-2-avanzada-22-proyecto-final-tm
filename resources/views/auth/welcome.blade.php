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
                                            <h5 class="text-primary">Bienvenido!</h5>
                                            <p>Inicia sesion para continuar</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{route('login')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" maxlength="50" onkeypress="return soloLetrascorreo(event)" required>
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Contraseña</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="*********" aria-label="Password" aria-describedby="password-addon" name="password" required>
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            <div>
                                                <button class="btn btn-primary waves-effect waves-light"  type="submit">Iniciar sesion</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>© 2022 programacion avanzada en internet</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        @include('layouts.scripts')
        <script src="public/js/app.js"></script>


    </body>

</html>
