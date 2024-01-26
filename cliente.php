<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series de Television</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./icon/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./style/style.css">

</head>

<body>
    <?php
        $idSerie = $_POST["idSerie"];
        $nombre = $_POST["nombre"];
        $nacionalidad = $_POST["nacionalidad"];
        $anoEstreno = $_POST["anoEstreno"];
    
    
    ?>
    <br><br>
    <div class="container">
        <div class="card">
            <h1 class="text-center">Modificar</h1>
            <form action="http://localhost/series/indexSeries.php" method="post">
                <input type="hidden" name="accion" value="modificar">
                <!-- Modificar idSerie antigua con name -->
                <input type="hidden" name="idSerieAnterior" value="<?=$idSerie?>"> 
                <div class="mb-3 aire">
                    <label for="idSerie" class="form-label">id Serie</label>
                    <input 
                    type="text" 
                    class="form-control" 
                    id="idSerie"
                    name="idSerie"
                    value="<?=$idSerie?>"
                    size="10">
                </div>
                <div class="mb-3 aire">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input 
                    type="text" 
                    class="form-control" 
                    id="nombre"
                    name="nombre"
                    value="<?=$nombre?>">
                </div>

                <div class="mb-3 aire">
                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    <input 
                    type="text" 
                    class="form-control" 
                    id="nacionalidad"
                    name="nacionalidad"
                    value="<?=$nacionalidad?>">
                </div>

                <div class="mb-3 aire">
                    <label for="anoEstreno" class="form-label">Año del estreno</label>
                    <input 
                    type="number" 
                    class="form-control" 
                    id="anoEstreno"
                    name="anoEstreno"
                    value="<?=$anoEstreno?>">
                </div>
              
                <div class="mb-3 aire">
                <button type="submit" class="btn btn-success">Aceptar</button>
                
                <button type="submit" class="btn btn-danger"><a href="index.php">Cancelar</a></button>
               
                </div>
            </form>

        </div>
    </div>

   
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>