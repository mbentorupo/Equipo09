<!DOCTYPE html>
<html>
<head>
    <title>Buscar Personal</title>
</head>
<body>
    <h1>Buscar Personal</h1>

    <a href="index.php">Volver a la página principal</a>

    <form action="buscarPersonal.php" method="POST">
        <label for="busqueda">Buscar personal por nombre:</label>
        <input type="text" id="busqueda" name="busqueda" required minlength="3">
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $busqueda = $_POST["busqueda"];

        // Realizar la búsqueda en el archivo personal.csv y mostrar los resultados
        $lines = array_map('str_getcsv', file('personal.csv'));
        $header = array_shift($lines);

        $resultados = array();
        foreach ($lines as $line) {
            $nombre = $line[array_search('nombre', $header)];
            if (stripos($nombre, $busqueda) !== false) {
                $resultados[] = $line;
            }
        }

        if (count($resultados) > 0) {
            echo "<h2>Personas encontradas</h2>";
            echo "<ul>";
            foreach ($resultados as $resultado) {
                $nombre = $resultado[array_search('nombre', $header)];
                echo "<li><a href='visualizarPersonal.php?nombre=" . urlencode($nombre) . "'>$nombre</a></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se ha encontrado ningún registro.</p>";
        }
    }
    ?>
</body>
</html>

