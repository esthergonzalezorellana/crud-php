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
        $borrar = "DELETE FROM serie WHERE idSerie =\"$_POST[idSerie]\"";
        mysqli_query($conexion, $borrar);
    }

    if ($_POST["accion"] == "insertar") {
        $insertar = "INSERT INTO serie VALUES (\"$_POST[idSerie]\", \"$_POST[nombre]\", \"$_POST[nacionalidad]\", \"$_POST[anoEstreno]\")";
        mysqli_query($conexion, $insertar);
    }


    if ($_POST["accion"] == "modificar") {
         // Hay que modificar el idSerie desde cliente.php con input hidden en name. Se utiliza idSerie para seleccionar la fila entera
        $modificar = "UPDATE serie SET idSerie=\"$_POST[idSerie]\", nombre=\"$_POST[nombre]\", nacionalidad=\"$_POST[nacionalidad]\", anoEstreno=\"$_POST[anoEstreno]\" WHERE idSerie=\"$_POST[idSerieAnterior]\""; // id serie anterior?
        mysqli_query($conexion, $modificar);
    }

    $consulta = mysqli_query($conexion, "SELECT * FROM serie");
    ?>
    <br><br>
    <div class="container">
        <div class="card">
            <h1 class="text-center">Series de television</h1>
            <br>

            <table class="table table-hover">
                <tr>
                    <th>idSerie</th>
                    <th>Nombre de la serie</th>
                    <th>Nacionalidad de la serie</th>
                    <th>Año de estreno</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                while ($registro = mysqli_fetch_array($consulta)) {
                ?>
                    <tr>
                        <td><?= $registro['idSerie'] ?></td>
                        <td><?= $registro['nombre'] ?></td>
                        <td><?= $registro['nacionalidad'] ?></td>
                        <td><?= $registro['anoEstreno'] ?></td>
                        <td>
                            <form action="http://localhost/series/indexSeries.php" method="post">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="idSerie" value="<?= $registro['idSerie'] ?>">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-recycle"></i> Eliminar</button>
                            </form>
                        </td>
                    
                        <td>
                            <form action="http://localhost/series/cliente.php" method="post">
                                <input type="hidden" name="idSerie" value="<?= $registro['idSerie'] ?>">
                                <input type="hidden" name="nombre" value="<?= $registro['nombre'] ?>">
                                <input type="hidden" name="nacionalidad" value="<?= $registro['nacionalidad'] ?>">
                                <input type="hidden" name="anoEstreno" value="<?= $registro['anoEstreno'] ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-pen"></i>Modificar</button>
                            </form>
                        </td>
                <?php
                }
                ?>
                <form action="http://localhost/series/indexSeries.php" method="post">
                    <input type="hidden" name="accion" value="insertar">
                    <tr>
                        <td><input type="text" name="idSerie" size="10" required></td>
                        <td><input type="text" name="nombre" required></td>
                        <td><input type="text" name="nacionalidad" required></td>
                        <td><input type="number" name="anoEstreno" size="10"></td>
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