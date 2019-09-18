<?php
session_start();
include ("conectabd.php");
$hotel_conserje = mysqli_prepare($link, " SELECT nombre,estrellas,hab_disp,precio FROM hotel ");
  
    $hotel_conserje->execute();
    $peso="$"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conserje</title>
</head>
<body>
    <h1>Oferta de Hoteles  <?php  ?> </h1>

<?php
    
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
      <br>
      
          <td> <font face="Arial">Nombre</font> </td> 
          <td> <font face="Arial">Estrellas</font> </td> 
     
          <td> <font face="Arial">Habitaciones Disponibles</font> </td> 
          <td> <font face="Arial">Precio</font> </td> 
       
      </tr>';
 
if ($result= $hotel_conserje->get_result()) {
    while ($row = $result->fetch_assoc()) {
     
        $field1name = $row["nombre"];
        $field2name = $row["estrellas"];
   
        $field4name = $row["precio"];
        $field5name = $row["hab_disp"];
    
 
        echo '<tr> 
                
                  <td>'.$field1name.'</td> 
                  <td>'.'&nbsp&nbsp&nbsp&nbsp&nbsp'.$field2name.'</td> 
    
                  <td>'.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$field5name.'</td> 
                  <td>'.$peso.$field4name.'</td> 
              </tr>';
    }
    $result->free();
} 