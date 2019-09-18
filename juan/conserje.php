<?php
session_start();
include ("conectabd.php");
$hotel_conserje = mysqli_prepare($link, " SELECT id,nombre,estrellas,habitaciones,hab_disp,precio FROM hotel WHERE id_encargado = ? ");
    $hotel_conserje->bind_param('i', $_SESSION['id']);
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
    <h1>Conserje/ <?php echo $_SESSION['user'] ?> </h1>

<?php
    
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
      <br>
      <td> <font face="Arial">ID</font> </td> 
          <td> <font face="Arial">Nombre</font> </td> 
          <td> <font face="Arial">Estrellas</font> </td> 
          <td> <font face="Arial">Habitaciones</font> </td> 
          <td> <font face="Arial">Habitaciones Disponibles</font> </td> 
          <td> <font face="Arial">Precio</font> </td> 
       
      </tr>';
 
if ($result= $hotel_conserje->get_result()) {
    while ($row = $result->fetch_assoc()) {
        $field0name = $row["id"];
        $field1name = $row["nombre"];
        $field2name = $row["estrellas"];
        $field3name = $row["habitaciones"];
        $field4name = $row["precio"];
        $field5name = $row["hab_disp"];
    
 
        echo '<tr> 
                  <td>'.$field0name.'</td> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$field5name.'</td> 
                  <td>'.$peso.$field4name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
<form action="carga_precios_hab.php" method="post">
            <p>Cargar Precio y Habitaciones Hotel</p>
            <p>
            ID DEL HOTEL<input type="number" name="id" placeholder="ID" required>
            PRECIO<input type="number" name="precio" placeholder="Precio" required>
            HABITACIONES DISPONIBLES<input type="number" name="hab_disp" placeholder="Habitaciones Disponibles" required>

            </p>
           
            <br><input type="submit" name="agregar" value="Cargar">
            <br>



</body>
</html>