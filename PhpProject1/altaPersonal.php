<!DOCTYPE html>
<html>
<head>
    <title>Alta de Personal</title>
</head>
<body>
    <h1>Alta de Personal</h1>

    <a href="index.php">Volver a la página principal</a>

    <form action="altaPersonal.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>

        <label for="dni">DNI (Formato: 12345678B):</label>
        <input type="text" id="dni" name="dni" pattern="^\d{8}[A-HJ-NP-TV-Z]$" required>
        <br>

        <label for="foto">Foto (PNG/JPEG, no más de 300 x 300 píxeles):</label>
        <input type="file" id="foto" name="foto" accept="image/jpeg, image/png" required>
        <br>

        <button type="submit">Dar de Alta</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        
        // Validar la subida de la foto y guardar en la carpeta "img"
        $nombreFoto = uniqid() . '.png'; // Cambiar a .jpeg si es necesario

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], "img/$nombreFoto")) {
            // Los datos son válidos, guardar en el archivo personal.csv
            $fechaIncorporacion = date('Y-m-d'); // Fecha actual
            $nuevoRegistro = "$dni;$nombre;$fechaIncorporacion;$nombreFoto\n";
            file_put_contents('personal.csv', $nuevoRegistro, FILE_APPEND);
            
            echo "<p>Alta de personal exitosa.</p>";
        } else {
            echo "<p>Error al subir la foto.</p>";
        }
    }
    ?>
</body>
</html>
