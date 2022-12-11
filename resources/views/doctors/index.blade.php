@extends('layouts.admin')

@section('titulo', )

<span>Odontologos</span>
@push('styles')
    


<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/buttons.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/responsive.bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('/libs/boostrap-toggle/css/boostrap-toggle.min.css')}}">


@endpush

<a href="" class= "btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
  <i class= "fas fa-plus" ></i>

</a>

@endsection

@section('contenido')

@include('doctors.modal.create')



<div class="card">
        <div class="card-body">

            <table id="doctor" class="table table-bordered display nowrap" cellspacing="0" width= "100%">
                <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Cedula</th>
                    <th class="text-center">Direccion</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Sexo</th>
                    <th class="text-center">Online/Offline </th>
                    <th class="text-center">Estatus</th>
                   
                    <th class="text-center">Creacion</th>

                    <th class="text-center">Fecha de Ingreso</th>
                    <th class="text-center">Fecha de Actualizacion</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr class="text-center">
                        <td>{{$doctor->id}}</td>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->email}}</td>
                        <td>{{$doctor->cedula}}</td>
                        <td>{{$doctor->address}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->sexo}}</td>

                        <td> 
                            @if($doctor->isUserOnline())
                                <label class= "py-2 px-3 badge btn-success"> Online</label>
                            
                            @else
                                <label class= "py-2 px-3 badge btn-warning"> Offline</label>       
                            @endif
                        </td>

                        <td>
                        @if($doctor->status == 1)
                        <a href="{{ route('doctors.status.update', ['doctor_id' => $doctor->id, 'status_code' => 0])}}"
                            class= "btn btn-success m-2">
                           <i class="fa fa-check"></i>

                        </a>

                        @else
                        <a href="{{ route('doctors.status.update', ['doctor_id' => $doctor->id, 'status_code' => 1])}}"
                            class= "btn btn-danger m-2">
                           <i class="fa fa-ban"></i>

                        @endif

                        </td>
                       

                        <td>{{$doctor->created_at->diffForHumans()}}</td>
                        <td> {{date ('d - m - Y h:i', strtotime($doctor->created_at))}} </td>
                        <td> {{date ('d - m - Y h:i', strtotime($doctor->updated_at))}} </td>

                        <td>
                            <a href="#" data-toggle="modal" data-target="#editMdl-{{$doctor->id}}">
                                <i class= "far fa-edit"></i>
                            </a>    


                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="post" style="display: inline-block;">
                            @method('DELETE')  
                            {{csrf_field()}}  
                              <button type="submit" >
                                <i class= "fas fa-trash-alt  "></i>
                            
                              </button>
                            </form>

                            
                        </td>
                        @include('doctors.modal.update')
                        @include('doctors.modal.delete')
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

<script src="{{asset('/libs/boostrap-toggle/js/boostrap-toggle.min.js')}}"></script>


<script>
    $(document).ready(function() {
    $('#doctor').DataTable( {

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
            extend:'print', 
            exportOptions: {
                columns: [0,1,2,3,4,5,7]
              }
            },
            {
            extend:'pdf',
            exportOptions: {
                columns: [0,1,2,3,4,5]
              }
            
             }, 'copy', 'excel', 'csv'
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
            $('#editMdl-{{$doctor->id}}').modal('show');
        });

</script>
    @endif
@endif





@endpush   

