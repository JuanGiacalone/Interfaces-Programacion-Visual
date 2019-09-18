<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>ADMIN</title>
</head>
<body>
    <h1>ADMIN/MAIN</h1>

    <form action="agregar_hoteles.php" method="post">
            <p>Cargar Hotel</p>
            <p>
            HOTEL<input type="text" name="hotel" placeholder="Hotel1" required>
            ESTRELLAS<input type="number" name="estrellas" placeholder="Estrellas" required>
            HABITACIONES<input type="number" name="habitaciones" placeholder="Habitaciones" required>
            CONSERJE<input type="number" name="conserje" placeholder="ID conserje a cargo" required>
            </p>
           
            <br><input type="submit" name="agregar" value="Agregar Hotel">
            
            <p> <a href="crear_conserje.php">Agregar Conserje</a><br /></p>        

</body>
</html>