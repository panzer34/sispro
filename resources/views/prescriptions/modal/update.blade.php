
<div class="modal animated zoomIn" id="editMdl-{{$prescription->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Editar Receta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('prescriptions.update', $prescription->id)}}" role="form" method="POST" id="createProductFrm">
                @method('PUT')
                {{csrf_field()}}

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Nombre</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control" value="{{$prescription->indicaciones}}"
                                       name="indicaciones" id="indicaciones">
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="medicine_id" class="form-fields">Medicamentos</label>
                                
                                
                                <div class="p-3 mb-2 bg-gradient-success ">
                                       <select name="medicine_id" id="medicines" class="form-control " data-live-search="true" data-style="btn-danger">
                                       <option value= "" disabled>Seleccione un medicamento</option>
                                       @foreach ($medicines as $medicine)
                                      
                                       <option value="{{$medicine->id}}"
                                       {{$medicine->id == $prescription->medicine_id ? 'selected' : ''}}
                                        

                                       
                                       >{{$medicine->name}}</option>

                                      

                                       @endforeach
                                       
                                       
                                    </select>
                                       
                                    </div>

                                       
                             
                            </div>
                        </div>

                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="products" class="form-fields">Odontologos</label>
                                
                                
                                <div class="p-3 mb-2 bg-gradient-success">
                                       <select name="user_id" id="users" class="form-control " data-live-search="true" data-style="btn-primary">
                                       <option value= "" disabled>Seleccione un Odontologo</option>
                                       @foreach ($doctors as $doctor)
                                       
                                       <option value="{{$doctor->id}}"
                                       @if ($doctor->id == $prescription->user_id)
                                       selected 

                                       @endif
                                       >{{$doctor->name}}</option>


                                       @endforeach
                                       
                                       
                                    </select>
                                       
                                    </div>

                                       
                             
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


