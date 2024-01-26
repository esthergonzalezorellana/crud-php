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
        $idPersonaje = $_POST["idPersonaje"];
        $nombre = $_POST["nombre"];
     
    ?>
    <br><br>
    <div class="container">
        <div class="card">
            <h1 class="text-center">Modificar</h1>
            <form action="http://localhost/series/indexPersonajes.php" method="post">
                <input type="hidden" name="accion" value="modificar">
                <input type="hidden" name="idPersonajeAnterior" value="<?=$idPersonaje?>"> 
                <div class="mb-3 aire">
                    <label for="idPersonaje" class="form-label">id Serie</label>
                    <input 
                    type="text" 
                    class="form-control" 
                    id="idPersonaje"
                    name="idPersonaje"
                    value="<?=$idPersonaje?>"
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
                <button type="submit" class="btn btn-success">Aceptar</button>
                
                <button type="submit" class="btn btn-danger"><a href="index.php">Cancelar</a></button>
               
                </div>
            </form>

        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>