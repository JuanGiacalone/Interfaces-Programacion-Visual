<?php
session_start();

$error = 0;
$es_admin = 0;

# Validaciones de seguridad para todo ingreso
if (isset($_POST['login'])) {	
		if (isset($_POST['user']) && isset($_POST['pass'])) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			if ($user == htmlspecialchars($user) &&
				$user == strip_tags($user) &&
				$pass == htmlspecialchars($pass) &&
				$pass == strip_tags($pass)) {
				$pass = $_POST['pass'];

				include("conectabd.php");
				
				$consulta_preparada = mysqli_prepare($link, "SELECT id,user,password,type FROM usuarios WHERE user = ?");				
				mysqli_stmt_bind_param($consulta_preparada, 's', $user);				
				mysqli_stmt_execute($consulta_preparada);				
				$res = $consulta_preparada->get_result();				
				$row = $res->fetch_assoc();

				# Si password que ingresamos en el formulario
				# coincide con el hash que tiene el password de la base de datos

				if (password_verify($pass,$row['password'])) {
					$error = 0;
					if ($row['type'] == 0) {
						$es_admin = 1;
						$consulta_administrador = mysqli_prepare($link, "SELECT id, user FROM usuarios where id = ?");
						mysqli_stmt_bind_param ($consulta_administrador, 'i', $row['id']);
						mysqli_stmt_execute($consulta_administrador);
						$res2 = $consulta_administrador->get_result();
						$row2 = $res2->fetch_assoc();
						$_SESSION['nombrelogin'] = $row2['usuario'];
						
					} else {
						$es_admin = 0;
						$consulta_preparada2 = mysqli_prepare($link, "SELECT id, user FROM usuarios WHERE id = ?");
						mysqli_stmt_bind_param($consulta_preparada2, 'i', $row['id']);
						mysqli_stmt_execute($consulta_preparada2);
						$res2 = $consulta_preparada2->get_result();
						$row2 = $res2->fetch_assoc();
						$_SESSION['id'] = $row2['id'];
						$_SESSION['user'] = $row2['user'];						
					}
				} else {
					$error = 1;
				}

			} else {
				$error = 2;
			}
		} else {
			$error = 3;
		} 
} else {
	$error = 4;
}

if (!$error) {
	if (!$es_admin) {
		header("Location: conserje.php");
	} else {
		header("Location: administrador.php");	
	}
} else {
	header("Location: login.php?e=$error");
}

?>