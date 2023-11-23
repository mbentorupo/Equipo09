<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Personal</title>
</head>
<body>
    <h1>Visualizar Personal</h1>

    <a href="index.php">Volver a la página principal</a>

    <?php
    if (isset($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
        
        // Buscar la información de la persona en el archivo personal.csv
        $lines = array_map('str_getcsv', file('personal.csv'));
        $header = array_shift($lines);

        $personaEncontrada = null;
        foreach ($lines as $line) {
            if ($line[array_search('nombre', $header)] === $nombre) {
                $personaEncontrada = $line;
                break;
            }
        }

        if ($personaEncontrada) {
            $nombre = $personaEncontrada[array_search('nombre', $header)];
            $dni = $personaEncontrada[array_search('DNI', $header)];
            $fechaIncorporacion = $personaEncontrada[array_search('fecha_incorporacion', $header)];
            $foto = $personaEncontrada[array_search('foto', $header)];

            echo "<h2>$nombre - $dni</h2>";
            echo "<p>Fecha de Incorporación: $fechaIncorporacion</p>";
            echo "<img src='img/$foto' alt='$nombre' />";
        } else {
            echo "<p>Persona no encontrada.</p>";
        }
    } else {
        echo "<p>No se ha especificado un nombre de persona.</p>";
    }
    ?>
</body>
</html>

