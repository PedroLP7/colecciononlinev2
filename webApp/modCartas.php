
<?php
require_once "../php_librarys/bdpokemon.php";
require_once "../php_partials/navbar.php";
// necesito una funcion que me de la info de la carta a la uqe le has dado click en el boton de modificar usando la id de la carta
$pokemonmod = infomodpoke($_POST["idPoke"]);
$regiones = getRegiones();
$tipos = getTipos();
foreach ($pokemonmod as $pokemon) {
}
?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M07Coleccion</title>
    <link rel="stylesheet" href="../styles/cssmod.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>

<body style="  background-image: url('../media/carta/fondo.jpg');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center center; 
    overflow: hidden;">
    <div class="container">
        <?php require_once "../php_partials/mensajes.php"; ?>

        <div class="card mt-2 border-dark">
            <div class="card-header bg-dark text-white"style="background-image: url('../media/carta/addfondo.png');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center center; 
    overflow: hidden;">
                MOD PKM
            </div>
            <div class="card-body">
                <form action="../php_controllers/pokemonController.php" method="POST" enctype="multipart/form-data">
          

                <div class="form-group row">
                        <label for="idPoke" class="col-sm-2 col-form-label">ID Pokemon</label>
                        <div class="col-sm-10">
                            <input type="text" name="idPoke" id="idPoke" class="form-control readonly-field" readonly
                                placeholder=""  value=" <?php echo $pokemon['idPoke']   ?>">
                        </div>
                    </div>

  <div>



  </div>










                    <div class="form-group row">
                        <label for="newPokedex" class="col-sm-2 col-form-label">Numero Pokedex</label>
                        <div class="col-sm-10">
                            <input type="text" name="newPokedex" id="newPokedex" class="form-control"
                                placeholder="Numero de la pokedex" autofocus value="<?php echo $pokemon['numPokedex'] ?>"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newnombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="newnombre" id="newnombre" class="form-control"
                                placeholder="Nombre del Pokemon"  value="<?php echo $pokemon['nombrePoke'] ?>" required>
                        </div>
                    </div>
                    

                    <div class="form-group row">
    <label for="newidRegion" class="col-sm-2 col-form-label">Region</label>
    <div class="col-sm-10">
        <select class="form-control" name="newidRegion" required>
            
            <?php  
             foreach ($regiones as $region) {
                $regionId = $region["IDregion"];
                $regionNombre = $region["nombreRegion"];
                $Selected = $regionId === $pokemon["idRegion"]; 

                echo '<option value="' . $regionId . '"';
                echo $Selected ? " selected" : "";
                echo ">" . $regionNombre . "</option>";
            } ?>
        </select>
    </div>
</div>


                    <div class="form-group row">
    <div>
        <label for="">Tipos</label>
        <br>
        <?php foreach ($tipos as $tipo) {
            $tipoId = $tipo["idTipo"];
            $tipoNombre = $tipo["nombreTipo"];
            $tipospoke = explode(",", $pokemon["idTipos"]);
            $Checked = in_array($tipoId, $tipospoke);

            echo '<input type="checkbox" class="btn-check" id="' .
                $tipoNombre .
                '" autocomplete="off" name="tipos_seleccionados[]" value="' .
                $tipoId .
                '"';
            echo $Checked ? " checked" : "";

            echo ">";
            echo '<label class="btn btn-primary" for="' .
                $tipoNombre .
                '">' .
                $tipoNombre .
                "</label>";
        } ?>
    </div>
</div>


            
                   
                    
                      <div class="form-group row">
                        <label for="newdescripcion" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                            <input type="text "name="newdescripcion" id="newdescripcion" class="form-control "
                                placeholder="Descripcion pokemon" autofocus value="<?php echo $pokemon['descripcion'] ?>"required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newcoleccion" class="col-sm-2 col-form-label">Coleccion</label>
                        <div class="col-sm-10">
                            <input type="text" name="newcoleccion" id="newcoleccion" class="form-control"
                                placeholder="Introduce la coleccion a la que pertenece..."  value="<?php echo $pokemon['coleccion'] ?>"required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newlink" class="col-sm-2 col-form-label">Enlace oficial</label>
                        <div class="col-sm-10">
                            <input type="text" name="newlink" id="newlink" class="form-control"
                                placeholder="Introduce el enlace de la tienda." autofocus value="<?php echo $pokemon['link'] ?>"required>
                        </div>
                    </div>




                    <div class="form-group row">
    <label for="newimagenPoke" class="col-sm-2 col-form-label">Imagen actual</label>
    <div class="col-sm-10">
        <img src="<?php echo $pokemon['imagenPoke']; ?>" class="imagenmod" alt="Imagen actual" class="img-fluid">
    </div>
</div>
<div class="form-group row">
    <label for="newimagenPoke" class="col-sm-2 col-form-label">Nueva imagen</label>
    <div class="col-sm-10">
        <input type="file" name="newimagenPoke" id="newimagenPoke" class="form-control-file" placeholder="Imagen aquí">
    </div>
</div>


                    <br>
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-light" name="update">ACEPTAR</button>
                            <a href="./index.php" class="btn btn-danger">Cancelar</a>
                        </
