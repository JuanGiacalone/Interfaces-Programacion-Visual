<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Pagina Adminsitrador</title>
</head>
<body>
    <h1>Administrador...</h1>

    <form action="Agregar_Hoteles.php" method="post">
            <p>Cargar Hoteles</p>
            <p>
            HOTEL<input type="text" name="hotel1" placeholder="Hotel1" required>
            ESTRELLAS<input type="text" name="estrella1" placeholder="Estrellas" required>
            HABITACIONES<input type="text" name="estrella1" placeholder="Habitaciones" required>
            </p>
            <p>
            HOTEL<br><input type="text" name="hotel2" placeholder="Hotel2" required>
            ESTRELLAS<input type="text" name="estrella2" placeholder="Estrellas" required>
            HABITACIONES<input type="text" name="estrella1" placeholder="Habitaciones" required>
            </p>
            <p>
            HOTEL<br><input type="text" name="hotel3" placeholder="Hotel3" required>
            ESTRELLAS<input type="text" name="estrella3" placeholder="Estrellas" required>
            HABITACIONES<input type="text" name="estrella1" placeholder="Habitaciones" required>		
            </p>
            <br><input type="submit" name="agregar" value="Agregar Hotel">
            
            <p> <a href="crear_conserje.php">Agregar Conserje</a><br /></p>        

</body>
</html>