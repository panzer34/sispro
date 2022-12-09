@extends('layouts.admin')

@section('titulo', )

<span>Receta</span>
@push('styles')
    


<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/buttons.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/datatables/responsive.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('libs/select/bootstrap-select.min.css')}}">



@endpush

<a href="" class= "btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
  <i class= "fas fa-plus" ></i>

</a>

@endsection

@section('contenido')

@include('prescriptions.modal.create')



<div class="card">
        <div class="card-body">

            <table id="receta" class="table table-bordered display nowrap" cellspacing="0" width= "100%">
                <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">Dosis</th>
                    
                    <th class="text-center">Medicamnetos</th>
                    <th class="text-center">Doctor</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prescriptions as $prescription)
                    <tr class="text-center">
                        <td>{{$prescription->id}}</td>
                        <td>{{$prescription->indicaciones}}</td>
                        
                        <td> {{$prescription->medicines->name ??''}}</td>
                        <td> {{$prescription->doctors->name ??''}}</td>
                        <td> {{date ('d - m - Y h:i', strtotime($prescription->created_at))}} </td>
                        <td>

                        <a href="{{route('download-pdfa', $prescription)}}">
                                <i class= "fa fa-print"></i>
                            </a> 



                            <a href="#" data-toggle="modal" data-target="#editMdl-{{$prescription->id}}">
                                <i class= "far fa-edit"></i>
                            </a>    


                            <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="post" style="display: inline-block;">
                            @method('DELETE')  
                            {{csrf_field()}}  
                              <button type="submit" >
                                <i class= "fas fa-trash-alt  "></i>
                            
                              </button>
                            </form>

                            
                        </td>
                        @include('prescriptions.modal.update')
                       
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

<script>
    $(document).ready(function() {
    $('#receta').DataTable( {

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

@endpush   