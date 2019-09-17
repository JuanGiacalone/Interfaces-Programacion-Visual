<?php 
    session_start();
    $error = '';
    if (isset($_GET['e']) && $_GET['e']==1) {
        $error = "<p style='color:red;'>Error de sesión.</p>";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>	
</head>
<body> 	
      <a href="index.php">Salir del sistema...!</a>   

<?php echo $error; ?>
    <form action="controlar.php" method="post">
	  <p>
	    <input type="text" name="user"  placeholder="Usuario" required>
	  </p>
	  <p>
	    <input type="password" name="pass"  placeholder="Contraseña" required>
    </p>
		<input type="submit" name="login" value="Ingresar">
    </form>
    <br>
    Usuario: admin<br>
    Clave: 1234
    <br>
    <br>
    Usuario: conserje<br>
    clave: 123456
</body>
</html>