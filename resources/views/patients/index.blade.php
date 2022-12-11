@extends('layouts.admin')

@section('titulo', )

<span>Pacientes</span>
@push('styles')
    


<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/buttons.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/responsive.bootstrap.min.css')}}">




@endpush

<a href="" class= "btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
  <i class= "fas fa-plus" ></i>

</a>

@endsection

@section('contenido')

@include('patients.modal.create')



<div class="card">
        <div class="card-body">

            <table id="paciente" class="table table-bordered display nowrap" cellspacing="0" width= "100%">
                <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Cedula</th>
                    <th class="text-center">Direccion</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Sexo</th>
                    <th class= "text-center">Online/Offline</th>
                  
                    <th class="text-center">Creacion</th>
                    <th class="text-center">Fecha de Ingreso</th>
                    <th class="text-center">Fecha de Actualizacion</th>
                    
                    
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $p)
                    <tr class="text-center">
                        <td>{{$p->id}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->email}}</td>
                        <td>{{$p->cedula}}</td>
                        <td>{{$p->address}}</td>
                        <td>{{$p->phone}}</td>
                        <td>{{$p->sexo}}</td>

                        <td> 
                            @if($p->isUserOnline())
                                <label class= "py-2 px-3 badge btn-success"> Online</label>
                            
                            @else
                                <label class= "py-2 px-3 badge btn-warning"> Offline</label>       
                            @endif
                        </td>
                       
                        <!-- <td>
                        @if($p->banned_until )
                        <a href=" ['paciente_id' => $p->id, 'status_code_paciente' ])}}"
                            class= "btn btn-success m-2">
                           <i class="fa fa-check"></i>

                        </a>

                        @else
                        <a href=" => $p->id, 'status_code_paciente' ])}}"
                            class= "btn btn-danger m-2">
                           <i class="fa fa-ban"></i>

                        @endif

                        </td> -->



                        <td>{{$p->created_at->diffForHumans()}}</td>
                        <td> {{date ('d - m - Y h:i', strtotime($p->created_at))}} </td>
                        <td> {{date ('d - m - Y h:i', strtotime($p->updated_at))}} </td>
                        

                        <td>
                            <a href="#" data-toggle="modal" data-target="#editMdl-{{$p->id}}">
                                <i class= "far fa-edit"></i>
                            </a>    


                            <form action="{{ route('patients.destroy', $p->id) }}" method="post" style="display: inline-block;">
                            @method('DELETE')  
                            {{csrf_field()}}  
                              <button type="submit" >
                                <i class= "fas fa-trash-alt  "></i>
                            
                              </button>
                            </form>

                            
                        </td>
                        @include('patients.modal.update')
                        @include('patients.modal.delete')
                </tr>
                @endforeach

</tbody>
</table>

</div>
</div>
@endsection

@push('scripts')


<script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/libs/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('/libs/datatables/buttons.colVis.min.js')}}"></script>

<script src="{{asset('/libs/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('/libs/datatables/jszip.min.js')}}"></script>
<script src="{{asset('/libs/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('/libs/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('/libs/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('/libs/datatables/dataTables.responsive.min.js')}}"></script>


<script>
    $(document).ready(function() {
    $('#paciente').DataTable( {

        language: {
             url: './libs/datatables/spanish.json'
        },
        responsive: true,
        autoWidth: false,

        
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'colvis',
                collectionLayout: 'fixed columns',
                collectionTitle: 'Column visibility control'
            },
            
            
            
            {
              extend:  'print',
              exportOptions: {
                columns: [0,1,2,3,4,5,7]
              }
            }, 
            {
            extend: 'pdf',
                exportOptions: {
                columns: [0,1,2,3,4,5]
              }
            
            },'copy', 'excel', 'csv'
        ],
        

        "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 Resultados', '25 Resultados', '50 Resultados', 'Motrar Todos' ]
        ],
      
    } );
} );

</script>

@if(!$errors->isEmpty())
    @if($errors->has('post'))
    <script>
        $(function(){
            $('#createMdl').modal('show');
        });
    </script>
    @else
    <script>
        $(function(){
            $('#editMdl-{{$p->id}}').modal('show');
        });

</script>
    @endif
@endif


@endpush   