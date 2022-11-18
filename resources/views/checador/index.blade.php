@extends('layouts.app')

@section('contenido')

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Chacador</h5>
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
    
                                <div class="text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Ingresar</button>
                                </div>

                            </form>
                        </div>
    
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')
 
@endsection