<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita</title>
</head>
<body>

<style>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #a39d9d;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #a39d9d;
}
</style>

<h1> Cita</h1>

<p style= text-align:right>N° de Cita: {{$appointment->numero}}</p>

<p style= text-align:right>Clinica Ondontologica</p>

<p style= text-align:right> San lorenzo</p>

<p style= text-align:right>fecha de creacion: {{date ('d - m - Y h:i', strtotime($appointment->created_at))}}</p>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo de la Cita</th>
                        
                       
                        <th>Especialidad</th>
                        <th>Doctor</th>
                        <th class="text-center">Motivo de consulta</th>
                        </tr>
</thead>
<tbody>
                    <tr class="text-center">
                        <td  style="text-align:center;">{{$appointment->id}}</td>
                        
                        <td  style="text-align:center;"> {{$appointment->specialties->name ??''}}</td>
                        
                        <td  style="text-align:center;"> {{$appointment->doctors->name ??''}}</td>
                        
                        <td  style="text-align:center;">{{$appointment->consulta}}</td>
                    </tr>

</tbody>
        </div>
    </div>
</div>

    
</body>
</html>