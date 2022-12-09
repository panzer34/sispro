<div class="modal animated zoomIn" id="editMdl-{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Odontologo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('doctors.update', $doctor->id)}}" role="form" method="POST" id="createProductFrm">
                @method('PUT')
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Nombre</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                       name="name" id="name" value="{{$doctor->name}}" >

                                       @if($errors->has('name'))

                                       <span class="text-danger">{{$errors->first('name')}}</span>

                                       @endif
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="cedula" class="form-fields">Cedula</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('cedula') ? 'is-invalid' : ''}}"
                                       name="cedula" id="cedula" value="{{$doctor->cedula}}" >

                                       @if($errors->has('cedula'))

                                       <span class="text-danger">{{$errors->first('cedula')}}</span>

                                       @endif
                              
                             
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="sexo" class="form-fields">Sexo</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('sexo') ? 'is-invalid' : ''}}"
                                       name="sexo" id="sexo" value="{{$doctor->sexo}}">

                                       @if($errors->has('sexo'))

                                       <span class="text-danger">{{$errors->first('sexo')}}</span>

                                       @endif
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="phone" class="form-fields">Celular</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}"
                                       name="phone" id="phone" value="{{$doctor->phone}}" >

                                       @if($errors->has('phone'))

                                       <span class="text-danger">{{$errors->first('phone')}}</span>

                                       @endif
                              
                             
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="email" class="form-fields">Email</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                       name="email" id="email" value="{{$doctor->email}}">

                                       @if($errors->has('email'))

                                       <span class="text-danger">{{$errors->first('email')}}</span>

                                       @endif
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="password" class="form-fields">Password</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                       name="password" id="password" value="{{$doctor->password}}" >

                                       @if($errors->has('password'))

                                       <span class="text-danger">{{$errors->first('password')}}</span>

                                       @endif
                              
                             
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}"
                     name = "address" id="address" value="{{$doctor->address}}" placeholder="Direccion del Odontologo">
                     @if($errors->has('address'))
                     <span class="text-danger">{{$errors->first('address')}}</span>

                     @endif
                    </div>
                    

                    <div class="buttons-form-submit d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                        <button type="submit" href="#" class="btn btn-primary">
                            Guardar
                            <i class="fas fa-spinner fa-spin d-none"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>