@extends('layouts.admin')

@section('titulo', )

<span>Cita</span>
@push('styles')
    


<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/buttons.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/responsive.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{asset('/libs/boostrap-toggle/css/boostrap-toggle.min.css')}}">



@endpush

<a href="" class= "btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
  <i class= "fas fa-plus" ></i>

</a>

@endsection

@section('contenido')

@include('appointments.modal.create')



<div class="card">
        <div class="card-body">

            <table id="cita" class="table table-bordered display nowrap" cellspacing="0" width= "100%">
                <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">Numero de la cita</th>
                    
                    <th class="text-center">Especialidad</th>
                    <th class="text-center">Doctor</th>
                    <th class="text-center">Motivo de la Consulta</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center">Fecha de Creacion</th>
                    <th class="text-center">Fecha de Actualizacion</th>

                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr class="text-center">
                        <td>{{$appointment->id}}</td>
                        <td>{{$appointment->numero}}</td>
                        <td> {{$appointment->specialties->name ??''}}</td>
                        
                        <td> {{$appointment->doctors->name ??''}}</td>
                        
                        <td>{{$appointment->consulta}}</td>
                        <td>
                        <input data-id="{{$appointment->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Atendido" data-off="EnEspera" {{ $appointment->status ? 'checked' : '' }}>

                        </td>

                        <td> {{date ('d - m - Y h:i', strtotime($appointment->created_at))}} </td>
                        <td> {{date ('d - m - Y h:i', strtotime($appointment->updated_at))}} </td>
                        <td>
                          
                        <a href="{{route('download-pdf', $appointment)}}">
                                <i class= "fa fa-print"></i>
                            </a> 

                            <a href="#" data-toggle="modal" data-target="#editMdl-{{$appointment->id}}">
                                <i class= "far fa-edit"></i>
                            </a>    


                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="post" style="display: inline-block;" >
                            @method('DELETE')  
                            {{csrf_field()}}  
                              <button type="submit" >
                                <i class= "fas fa-trash-alt  "></i>
                            
                              </button>
                            </form>

                            
                        </td>
                        @include('appointments.modal.update')
                       
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
<script src="{{asset('/libs/select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('/libs/boostrap-toggle/js/boostrap-toggle.min.js')}}"></script>

<script>
    $(document).ready(function() {
    $('#cita').DataTable( {

        language: {
             url: './libs/datatables/spanish.json'
        },
        responsive: true,

        
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'colvis',
                collectionLayout: 'fixed columns',
                collectionTitle: 'Column visibility control'
            },
            
            
            'print', 'pdf','copy', 'excel', 'csv'
        ],

        "lengthMenu": [
            [ 10, 25, 50, -1 ],
            [ '10 Resultados', '25 Resultados', '50 Resultados', 'Motrar Todos' ]
        ],
      
    } );
} );

</script>

<script>
$(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var appointment_id = $(this).data('id'); 
      
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'changeStatusappointment',
            data: {'status': status, 'appointment_id': appointment_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>

@endpush   