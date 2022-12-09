<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{route('prescriptions.store')}}" role="form" method="POST" id="createProductFrm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Nombre</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control "
                                       name="indicaciones" id="indicaciones">
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="products" class="form-fields">Medicamentos</label>
                                
                                
                                        
                                       <select name="medicine_id" id="medicamento" class="form-control selectpicker" data-live-search="true" data-style="btn-primary">
                                      <option value= "">Seleccione un medicamento</option>
                                       @foreach ($medicines as $medicine)
                                      
                                       <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                      

                                       @endforeach
                                       
                                       
                                    </select>
                                       
                                     

                                       
                             
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="products" class="form-fields">Odontologos</label>
                                
                                
                                        
                                       <select name="user_id" id="users" class="form-control selectpicker" data-live-search="true" data-style="btn-primary">
                                       <option value= "">Seleccione un Oodntologo</option>
                                       @foreach ($doctors as $d)
                                      
                                       <option value="{{$d->id}}">{{$d->name}}</option>
                                      

                                       @endforeach
                                       
                                       
                                    </select>
                                       
                                     

                                       
                             
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