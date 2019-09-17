<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Pagina Adminsitrador</title>
</head>
<body>
    <h1>Administrador.../Nuevo Conserje </h1>

    <form action="registra_conserje.php" method="POST">
            <p>Nuevo conserje</p>
            <p>
            Usuario<input type="text" name="user" placeholder="user" required>
            Contraseña<input type="password" name="password" placeholder="password" required>
            
            </p>
            
            <br><input type="submit" name="login" value="Registrar">
            
            <p><a href="administrador.php">Volver</a><br /></p>        

</body>
</html>