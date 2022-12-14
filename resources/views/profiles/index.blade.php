@extends('layouts.admin')

@section('titulo', )

<span>Perfil del Usuario</span>
@push('styles')
    

@endpush


@endsection



@section('contenido')

@if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif





<div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4 ">
                    
                    <img src=" {{asset('imagenes/'.Auth::user()->imagen)}}" alt="{{Auth::user()->imagen}}" style="height: 300px; width: 335px;" class="rounded-circle" id="output"/>
                    
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

                    <form method="POST" action="{{route('profiles.update')}}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                   

                        <h6 class="heading-small text-muted mb-4">Informacion del Usuario</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Nombre<span class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Nombre" value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Apellido</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Apellido" value="{{ old('last_name', Auth::user()->last_name) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Correo Electronico<span class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="current_password">Contrase??a Actual</label>
                                        <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Contrase??a Actual">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">Nueva Contrase??a</label>
                                        <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Nueva Contrase??a">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Confirmar Contrase??a</label>
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirmar Contrase??a">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <label for="imagen">Example file input</label>
                                   
                                    <input type="file" class="form-control-file" name="imagen" id="image" value="{{ Auth::user()->imagen}}" onchange="loadFile(event)">
                                    
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

@push('scripts')

    <script>
        var loadFile = function(event){
          

           var output = document.getElementById('output');
           output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>


@endpush