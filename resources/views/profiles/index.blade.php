@extends('layouts.admin')

@section('titulo', )

<span>Perfil del Usuario</span>
@push('styles')
    

@endpush


@endsection



@section('contenido')


<div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4">
                    <figure class="rounded-circle avatar avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}"></figure>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">
                                @auth
                                   {{ Auth::user()->name }}
                                @endauth</h5>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                
                                <span class="description">Edad</span>
                                
                            </div>
                            <span class ="heading">22</span>
                        </div>
                      
                      
                   

                   
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                
                                <span class="description ">Rol</span>
                                
                            </div>
                            {{ old('role', Auth::user()->role) }}
                            <span class ="heading" >
                                
                            </span>
                            
                        </div>
                    </div>
                      
                      
                    


                </div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mi Cuenta</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="PUT">

                        <h6 class="heading-small text-muted mb-4">Informacion del Usuario</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Nombre<span class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Nombre" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Apellido</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Apellido" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Correo Electronico<span class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="password">Contraseña Actual</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña Actual">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">Nueva Contraseña</label>
                                        <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Nueva Contraseña">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Confirmar Contraseña</label>
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña">
                                    </div>
                                </div>
                            </div>
                        </div>
<br>
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

</div>


@endsection