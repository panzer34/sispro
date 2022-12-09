@extends('layouts.admin')

@section('titulo', )
<span>Horario de Medicos</span>
@push('styles')
    


<link rel="stylesheet" href="">
<link rel="stylesheet" href="">
<link rel="stylesheet" href="{{asset('/libs/boostrap-toggle/css/boostrap-toggle.min.css')}}">


@endpush
@endsection

@section('contenido')

<form action= "{{route('horarios.store')}}" method="POST"> 
{{csrf_field()}}
<button type="submit" class= "btn btn-primary "  
   class= "fas fa-plus" >Guardar Cambios
</button>
</a>
                            
    



<div class="card">
        <div class="card-body">

            <table id="doctor" class="table table-bordered display nowrap" cellspacing="0" width= "100%">
                <thead>
                <tr>
                    <th class="text-center">Dia</th>
                    <th class="text-center">Activo</th>
                    <th class="text-center">Turno mañana</th>
                    <th class="text-center">Turno tarde</th>
                    
                    
                    
                </tr>
                </thead>
                <tbody>
                @foreach($horarios as $key => $horario)
                    <tr class="text-center">
                        <td>{{$days[$key]}}</td>
                        <td> 
                            <label>
                            <input type="checkbox" name="active[]" value="{{$key}}" data-toggle="toggle"
                            data-onstyle="success" data-offstyle="danger"
                           @if ($horario->active) checked  @endif >
                            </label>
                        </td>
                        <td> 
                            <div class= "row">
                                <div class="col">
                                    <select class= "form-control" name="morning_start[]">
                                        @for($i=8; $i<=11; $i++)
                                        <option value= "{{$i}}:00 "
                                        @if($i.':00 AM' == $horario-> morning_start ) selected @endif>
                                        {{$i}}:00 AM </option>
                                        <option value= "{{$i}}:30 "
                                        @if($i.':30 AM' == $horario-> morning_start ) selected @endif> 
                                        {{$i}}:30 AM </option>

                                        @endfor

                                    </select>
                                </div>   

                                <div class="col">
                                    <select class= "form-control" name="morning_end[]">
                                        @for($i=8; $i<=11; $i++)
                                        <option value= "{{$i}}:00 "
                                        @if($i.':00 AM' == $horario-> morning_end ) selected @endif> 
                                        {{$i}}:00 AM </option>
                                        <option value= "{{$i}}:30 "
                                        @if($i.':30 AM' == $horario-> morning_end ) selected @endif>
                                         {{$i}}:30 AM </option>

                                        @endfor

                                    </select>
                                </div>   
                            </div>
                        </td>

                        <td> 
                            <div class= "row">
                                <div class="col">
                                    <select class= "form-control" name="afternoon_start[]">
                                        @for($i=1; $i<=11; $i++)
                                        <option value= "{{$i+12}}:00 "
                                        @if($i.':00 PM' == $horario-> afternoon_start ) selected @endif> 
                                        {{$i}}:00 PM </option>
                                        <option value= "{{$i+12}}:30 "
                                        @if($i.':30 PM' == $horario-> afternoon_start ) selected @endif> 
                                        {{$i}}:30 PM </option>

                                        @endfor

                                    </select>
                                </div>   

                                <div class="col">
                                    <select class= "form-control" name="afternoon_end[]">
                                        @for($i=1; $i<=11; $i++)
                                        <option value= "{{$i+12}}:00 "
                                        @if($i.':00 PM' == $horario-> afternoon_end ) selected @endif> 
                                        {{$i}}:00 PM </option>
                                        <option value= "{{$i+12}}:30 "
                                        @if($i.':30 PM' == $horario-> afternoon_end ) selected @endif> 
                                        {{$i}}:30 PM </option>

                                        @endfor

                                    </select>
                                </div>   
                            </div>
                        </td>
                        
                        
                       

                       
                        

                        
                        
                </tr>
                @endforeach

</tbody>
</table>

</div>
</div>

</form>
            

@endsection


@push('scripts')

<script src="{{asset('/libs/boostrap-toggle/js/boostrap-toggle.min.js')}}"></script>

@endpush 

