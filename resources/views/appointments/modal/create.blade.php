<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nueva cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('appointments.store')}}" role="form" method="POST" id="createProductFrm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Numero</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control "
                                       name="numero" id="numero">
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="products" class="form-fields">Especialidad</label>
                                
                                
                                        
                                       <select name="specialty_id" id="user" class="form-control selectpicker" data-live-search="true" data-style="btn-primary">
                                      <option value= "">Seleccione una especialidad</option>
                                       @foreach ($specialties as $s)
                                      
                                       <option value="{{$s->id}}">{{$s->name}}</option>
                                      

                                       @endforeach
                                       
                                       
                                    </select>
                                       
                                     

                                       
                             
                            </div>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="products" class="form-fields">Odontologos</label>
                                
                                
                                        
                                       <select name="user_id" id="users" class="form-control selectpicker" data-live-search="true" data-style="btn-primary">
                                       <option value= "">Seleccione un Odontologo</option>
                                       @foreach ($doctors as $d)
                                      
                                       <option value="{{$d->id}}">{{$d->name}}</option>
                                      

                                       @endforeach
                                       
                                       
                                    </select>
                                       
                                     

                                       
                             
                            </div>
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Motivo de la consulta</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control "
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