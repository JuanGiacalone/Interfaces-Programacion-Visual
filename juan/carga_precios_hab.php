<?php
session_start();
include ("conectabd.php");
$error = 0;
if(isset($_POST['id']) && isset($_POST['precio']) && isset($_POST['hab_disp'])) {

    $id = $_POST['id'];

    $precio = $_POST['precio'];

    $habitaciones = $_POST['hab_disp'];
   

    
        $insert_hotel = mysqli_prepare($link," UPDATE hotel SET precio = ? , hab_disp= ? WHERE id = ? ");

        mysqli_stmt_bind_param($insert_hotel, 'iii', $precio,$habitaciones,$id);

        mysqli_stmt_execute($insert_hotel);

        if(mysqli_error($link)){echo mysqli_error($link);}else {echo "Datos agregados con exito !";}
  
}
 else
    $error = "Some var not set";
?>
<p><a href="conserje.php">Volver</a><br /></p>  