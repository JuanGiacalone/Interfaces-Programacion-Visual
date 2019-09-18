

<?php
session_start();
include ("conectabd.php");
$error = 0;
if(isset($_POST['hotel']) && isset($_POST['estrellas']) && isset($_POST['habitaciones']) && isset($_POST['conserje'])) {

    $hotel = $_POST['hotel'];

    $estrellas = $_POST['estrellas'];

    $habitaciones = $_POST['habitaciones'];
    $conserje = $_POST['conserje'];

    if ($hotel == htmlspecialchars($hotel) && $hotel == strip_tags($hotel))
    {
        $insert_hotel = mysqli_prepare($link,"INSERT INTO hotel (nombre,estrellas,habitaciones,id_encargado) VALUES(?,?,?,?) ");

        mysqli_stmt_bind_param($insert_hotel, 'siii', $hotel,$estrellas,$habitaciones,$conserje);

        mysqli_stmt_execute($insert_hotel);

        if(mysqli_error($link)){echo mysqli_error($link);}else {echo "Hotel creado con exito !";}
    }
    else{
            $error = "Illegal chars";
        }
}
 else
    $error = "Some var not set";
?>
<p><a href="administrador.php">Volver</a><br /></p>  






