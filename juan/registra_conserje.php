
<?php
session_start();
include ("conectabd.php");
$error = 0;
if(isset($_POST['login']) && isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $pass = $_POST['password'];
    if ($user == htmlspecialchars($user) && $user == strip_tags($user) && $pass == htmlspecialchars($pass) && $pass == strip_tags($pass))
    {
        $check_existence = mysqli_prepare($link,"SELECT user FROM usuarios WHERE user = ? ");
        mysqli_stmt_bind_param($check_existence, 's', $user);
        mysqli_stmt_execute($check_existence);
        $res = $check_existence->get_result();				
		$row = $res->fetch_assoc();
        if($row['user']==null)
        {
            $pass=password_hash($pass,PASSWORD_DEFAULT);
            $type=1;
            $insert_new_user = mysqli_prepare($link,"INSERT INTO usuarios(user,password,type) VALUES (?,?,?)");
            mysqli_stmt_bind_param($insert_new_user, 'ssi', $user,$pass,$type);
            mysqli_stmt_execute($insert_new_user);

            if(mysqli_error($link)){}else {echo "Usuario creado con exito !";}

        } else{
            echo "El usuario ya existe !!";
        }
    } else{
            $error = "Illegal chars";
        }
}
 else
    $error = "Some var not set";
?>
<p><a href="crear_conserje.php">Volver</a><br /></p>  