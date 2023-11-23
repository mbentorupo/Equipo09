<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Representación del Hospital y Gestión de la Información de las Áreas</title>
</head>
<body>
    <h1>Sistema de Representaci&oacute;n del Hospital y Gesti&oacute;n de la Informaci&oacute;n de las &Aacute;reas</h1>
    
    
    <a href="altaPersonal.php">Alta</a>

    <form action="buscarPersonal.php" method="POST">
        <label for="busqueda">Buscar personal por nombre:</label>
        <input type="text" id="busqueda" name="busqueda" required minlength="3">
        <button type="submit">Buscar</button> <!<!-- botón buscar -->
    </form>

    
    <h2>Últimas Incorporaciones</h2>
    <table border="1">
        <tr>
            <th>Fecha de Incorporaci&oacute;n</th>
            <th>&Uacute;ltimas Incorporaciones</th>
        </tr>
        <?php
        
        $lines = array_map('str_getcsv', file('personal.csv'));
        $header = array_shift($lines);
        array_multisort(array_column($lines, array_search('fecha_incorporacion', $header)), SORT_DESC, $lines);

        $count = 0;
        foreach ($lines as $line) {
            $count++;
            if ($count > 5) {
                break;
            }
            echo "<tr>";
            $nombre = $line[array_search('nombre', $header)];
            $fechaIncorporacion = $line[array_search('fecha_incorporacion', $header)];
            echo "<td>$fechaIncorporacion</td>";
            echo "<td><a href='visualizarPersonal.php?nombre=$nombre'>$nombre</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

