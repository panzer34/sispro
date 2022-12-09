<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta</title>

    <style>

body{
    margin: 0;
    padding: 0;
    background: url("img/dent.jpg");
    background-size: 800px;
    background-repeat: no-repeat;
    background-position: center;
}

footer {
position: fixed;
bottom: 0cm;
left: 0cm;
right: 0cm;
height: 2cm;
background-color: #de3131;
color: white;
text-align: center;
line-height: 20px;
}

h1{
    background-color: #de3131 ;
    color: white; 
}


#receta {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#receta td, #receta th {
  border: 1px solid #ddd;
 
  padding: 8px;
}

#receta tr:nth-child(even){background-color: #f2f2f2;}

#receta tr:hover {background-color: #ddd;}

#receta th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

    </style>
</head>
<body>

    <h1 style= "text-align:center" >Receta medica</h1>
   <p style= "text-align:right">Doctor: {{$prescription->doctors->name ??'' }}</p> 
    <p style= "text-align:right">Odontologia General </p>
    <p style= "text-align:right">fecha: {{date ('d - m - Y h:i', strtotime($prescription->created_at))}} </p>
    
    <br>
    <br>
    

       <table id="receta">
  <tr>
    <th>codigo de la receta</th>
    <th>Medicamento recetado</th>
    <th>Indicaciones</th>
  </tr>
  <tr>
    <td>{{$prescription->id}}</td>
    <td>{{$prescription->medicines->name ??''}}</td>
    <td>{{$prescription->indicaciones}}</td>
  </tr>

    </table>

    




<footer>
   
    <p> Clinica Odontologica</p>
    <p> Ciudad San Lorenzo</p>
 
    
</footer>
    
</body>
</html>