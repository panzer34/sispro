<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('medicines.store')}}" role="form" method="POST" id="createProductFrm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Nombre</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                       name="name" id="name" value="{{old('name')}}">

                                       @if($errors->has('name'))

                                       <span class="text-danger">{{$errors->first('name')}}</span>

                                       @endif
                              
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="unit_price" class="form-fields">Descripcion</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control "
                                       name="description" id="description"value="{{old('description')}}" >

                                       @if($errors->has('description'))

                                       <span class="text-danger">{{$errors->first('description')}}</span>

                                       @endif
                              
                             
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