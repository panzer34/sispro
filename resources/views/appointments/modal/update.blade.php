<div class="modal animated zoomIn" id="editMdl-{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nueva Receta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('appointments.update', $appointment->id )}}" role="form" method="POST" id="createProductFrm">
                @method('PUT')
                {{csrf_field()}}

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Numero</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control" value="{{$appointment->numero}}"
                                       name="numero" id="numero">
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="products" class="form-fields">Especialidad</label>
                                
                                
                                <div class="p-3 mb-2 bg-gradient-success">  
                                       <select name="specialty_id" id="user" class="form-control" >
                                      <option value= "selected" disabled>Seleccione una especialidad</option>
                                       @foreach ($specialties as $specialty)
                                      
                                       <option value="{{$specialty->id}}"
                                       {{$specialty->id == $appointment->specialty_id ? 'selected' : ''}}
                                        

                                       
                                       >{{$specialty->name}}</option>
                                      

                                       @endforeach
                                       
                                       
                                    </select>
                                </div>    
                                     

                                       
                             
                            </div>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="products" class="form-fields">Odontologos</label>
                                
                                <div class="p-3 mb-2 bg-gradient-success">
                                        
                                       <select name="user_id" id="users" class="form-control">
                                       <option value= "" disabled >Seleccione un Odontologo</option>
                                       @foreach ($doctors as $doctor)
                                      
                                       <option value="{{$doctor->id}}" class="others"
                                       {{$doctor->id == $appointment->user_id ? 'selected' : ''}}
                                        

                                       
                                       >{{$doctor->name}}</option>
                                      

                                       @endforeach
                                       
                                       
                                    </select>
                                </div>    
                                     

                                       
                             
                            </div>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Motivo de la consulta</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control" value="{{$appointment->consulta}}"
                                       name="consulta" id="consulta">
                                       </div>
                            </div>
                       
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