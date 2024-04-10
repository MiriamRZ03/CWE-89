<?php
include_once('tienda.php'); //archivo tienda.php dentro de este
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de productos de informática</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="m-4">
        <h2>Tienda de productos de informática <small class="text-muted fs-5">Universidad Veracruzana</small></h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Inicio</li>
            </ol>
        </nav>
        <?php
        //crea el objeto que tiene las funciones de conexión a MySQL
        $tienda = new Tienda();
        //se obtiene la conexión
        $mysqli = $tienda->obten_conexion();
        //obtenemos todos los fabricantes
        $consulta = "SELECT * FROM fabricante";
        //creamos consulta
        $sentencia = $mysqli->prepare($consulta);
        $sentencia->execute();
        //aqui queda el resultado
        $resultado = $sentencia->get_result();
        $sentencia->close();

        echo "<p>Listado de todos los fabricantes.</p>";
        $i = 0;
        echo '<table class="table table-sm table-striped table-bordered">';
        echo "<thead><tr>";
        echo "<th>Id</th>";
        echo "<th>Nombre</th>";
        echo "</tr></thead><tbody>";
        //recorremos para ir fila por fila
        while($fila=$resultado->fetch_assoc()):
            //imprimimos los datos
            echo "<tr>";
            echo "<td>{$fila["id"]}</td>";
            echo "<td><a href='productos.php?id={$fila["id"]}' class=''>{$fila["nombre"]}</a></td>";
            echo "</tr>";
            $i++;
        endwhile;
        echo '</tbody></table>';
        ?>
    </body>
</html>