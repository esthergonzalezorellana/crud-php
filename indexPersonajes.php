<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Series de televisión</title>
    <link rel="stylesheet" href="./style/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./icon/font/bootstrap-icons.min.css">

    </style>
</head>

<body>
<?php
    $conexion = mysqli_connect("db", "root", "test", "seriesTV");
 
    if (!isset($_POST["accion"])) {
        $_POST["accion"] = "";
    }
    if ($_POST["accion"] == "eliminar") {
        $borrar = "DELETE FROM personajes WHERE idPersonaje =\"$_POST[idPersonaje]\"";
        mysqli_query($conexion, $borrar);
    }

    if ($_POST["accion"] == "insertar") {
        $insertar = "INSERT INTO personajes VALUES (\"$_POST[idPersonaje]\", \"$_POST[nombre]\")";
        mysqli_query($conexion, $insertar);
    }


    if ($_POST["accion"] == "modificar") {
         // Hay que modificar el idPersonaje desde cliente.php con input hidden en name. Se utiliza idSerie para seleccionar la fila entera
        $modificar = "UPDATE personajes SET idPersonaje=\"$_POST[idPersonaje]\", nombre=\"$_POST[nombre]\" WHERE idPersonaje=\"$_POST[idPersonajeAnterior]\"";;
        mysqli_query($conexion, $modificar);
    }

    $consulta = mysqli_query($conexion, "SELECT * FROM personajes");
    ?>
    <br><br>
    <div class="container">
        <div class="card">
            <h1 class="text-center">Personajes de television</h1>
            <br>

            <table class="table table-hover">
                <tr>
                    <th>idPersonaje</th>
                    <th>Nombre del personaje</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                while ($registro = mysqli_fetch_array($consulta)) {
                ?>
                    <tr>
                        <td><?= $registro['idPersonaje'] ?></td>
                        <td><?= $registro['nombre'] ?></td>
                            <form action="http://localhost/series/indexPersonajes.php" method="post">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="idPersonaje" value="<?= $registro['idPersonaje'] ?>">
                                <td>
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-recycle"></i> Eliminar</button>
                            </form>
                        </td>
                    
                        <td>
                            <form action="http://localhost/series/clientePersonajes.php" method="post">
                                <input type="hidden" name="idPersonaje" value="<?= $registro['idPersonaje'] ?>">
                                <input type="hidden" name="nombre" value="<?= $registro['nombre'] ?>">
                                <td>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-pen"></i>Modificar</button>
                            </form>
                        </td>
                <?php
                }
                ?>
                <form action="http://localhost/series/indexPersonajes.php" method="post">
                    <input type="hidden" name="accion" value="insertar">
                    <tr>
                        <td><input type="text" name="idPersonaje" size="10" required></td>
                        <td><input type="text" name="nombre" required></td>
                        <td>
                            <button type="submit" class="btn btn-success"><i class="bi bi-floppy2-fill"></i> Crear</button>
                        </td>
                        <a href="./index.php" class="boton-atras">
                         <i class="bi bi-arrow-left-square"></i> Atrás
                        </a>
                    </tr>
                </form>
            </table>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>