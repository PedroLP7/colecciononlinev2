<?php session_start(); ?>
<?php require_once('../php_partials/navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M07Coleccion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="body2"style="  background-image: url('../media/carta/fondo.jpg');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center center; 
    overflow: hidden;" >
    <div class="container">
        <?php require_once('../php_partials/mensajes.php');
        
        if(isset($_SESSION['pokemon1'])){
            $pokemon1 = $_SESSION['pokemon1'];
            unset($_SESSION['pokemon1']);

        }else{


            

            $pokemon1=[
                'numPokedex'    => '',
                     'nombrePoke'=> '',
                
                'descripcion'=> '',
                


            ];


        }
    
        
        
        
        
        ?>

        <div class="card mt-2 border-danger">
            <div class="card-header bg-danger text-dark font-weight-bold"style="background-image: url('../media/carta/addfondo.png');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: center center; 
    overflow: hidden;">
                ADD PKM
            </div>
            <div class="card-body ">
                <form action="../php_controllers/pokemonController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="numPokedex" class="col-sm-2 col-form-label">Numero Pokedex</label>
                        <div class="col-sm-10">
                            <input type="text" name="numPokedex" id="numPokedex" class="form-control"
                                placeholder="Numero de la pokedex" autofocus value="<?php echo $pokemon1['numPokedex'] ?>"required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombrePoke" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="nombrePoke" id="nombrePoke" class="form-control"
                                placeholder="Nombre del Pokemon" autofocus value="<?php echo $pokemon1['nombrePoke'] ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="idRegion" class="col-sm-2 col-form-label">Region</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="idRegion" required>
                                <option value="" disabled selected>Elige la region...</option>
                                <option value="1">Kanto</option>
                                <option value="2">Johto</option>
                                <option value="3">Hoenn</option>
                                <option value="4">Sinnoh</option>
                                <option value="5">Teselia</option>
                                <option value="6">Kalos</option>
                                <option value="7">Alola</option>
                                <option value="8">Galar</option>
                                <option value="9">Paldea</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>

<div class="form-group row">
    <div>
    <label for="">Tipos</label>
    <br>
    <input type="checkbox" class="btn-check" id="Acero" autocomplete="off" name="tipos_seleccionados[]" value="1">
    <label class="btn btn-primary" for="Acero">Acero</label>

    <input type="checkbox" class="btn-check" id="Agua" autocomplete="off" name="tipos_seleccionados[]" value="2">
    <label class="btn btn-primary" for="Agua">Agua</label>

    <input type="checkbox" class="btn-check" id="Bicho" autocomplete="off" name="tipos_seleccionados[]" value="3">
    <label class="btn btn-primary" for="Bicho">Bicho</label>

    <input type="checkbox" class="btn-check" id="Dragón" autocomplete="off" name="tipos_seleccionados[]" value="4">
    <label class="btn btn-primary" for="Dragón">Dragón</label>

    <input type="checkbox" class="btn-check" id="Electrico" autocomplete="off" name="tipos_seleccionados[]" value="5">
    <label class="btn btn-primary" for="Electrico">Electrico</label>

    <input type="checkbox" class="btn-check" id="Fantasma" autocomplete="off" name="tipos_seleccionados[]" value="6">
    <label class="btn btn-primary" for="Fantasma">Fantasma</label>

    <input type="checkbox" class="btn-check" id="Fuego" autocomplete="off" name="tipos_seleccionados[]" value="7">
    <label class="btn btn-primary" for="Fuego">Fuego</label>

    <input type="checkbox" class="btn-check" id="Hada" autocomplete="off" name="tipos_seleccionados[]" value="8">
    <label class="btn btn-primary" for="Hada">Hada</label>


    <input type="checkbox" class="btn-check" id="Hielo" autocomplete="off" name="tipos_seleccionados[]" value="9">
    <label class="btn btn-primary" for="Hielo">Hielo</label>

    <input type="checkbox" class="btn-check" id="Lucha" autocomplete="off" name="tipos_seleccionados[]" value="10">
    <label class="btn btn-primary" for="Lucha">Lucha</label>

    <input type="checkbox" class="btn-check" id="Normal" autocomplete="off" name="tipos_seleccionados[]" value="11">
    <label class="btn btn-primary" for="Normal">Normal</label>

    <input type="checkbox" class="btn-check" id="Planta" autocomplete="off" name="tipos_seleccionados[]" value="12">
    <label class="btn btn-primary" for="Planta">Planta</label>

    <input type="checkbox" class="btn-check" id="Psiquico" autocomplete="off" name="tipos_seleccionados[]" value="13">
    <label class="btn btn-primary" for="Psiquico">Psiquico</label>

    <input type="checkbox" class="btn-check" id="Roca" autocomplete="off" name="tipos_seleccionados[]" value="14">
    <label class="btn btn-primary" for="Roca">Roca</label>

    <input type="checkbox" class="btn-check" id="Siniestro" autocomplete="off" name="tipos_seleccionados[]" value="15">
    <label class="btn btn-primary" for="Siniestro">Siniestro</label>

    <input type="checkbox" class="btn-check" id="Tierra" autocomplete="off" name="tipos_seleccionados[]" value="16">
    <label class="btn btn-primary" for="Tierra">Tierra</label>

    <input type="checkbox" class="btn-check" id="Veneno" autocomplete="off" name="tipos_seleccionados[]" value="17">
    <label class="btn btn-primary" for="Veneno">Veneno</label>
    

    <input type="checkbox" class="btn-check" id="Volador" autocomplete="off" name="tipos_seleccionados[]" value="18">
    <label class="btn btn-primary" for="Volador">Volador</label>


    </div>
</div>



                   
                    
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                            <input type="text "name="descripcion" id="descripcion" class="form-control "
                                placeholder="Descripcion pokemon" autofocus value="<?php echo $pokemon1['descripcion'] ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="coleccion" class="col-sm-2 col-form-label">Coleccion</label>
                        <div class="col-sm-10">
                            <input type="text" name="coleccion" id="coleccion" class="form-control"
                                placeholder="Introduce la coleccion a la que pertenece..." autofocus value="" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="link" class="col-sm-2 col-form-label">Enlace oficial</label>
                        <div class="col-sm-10">
                            <input type="text" name="link" id="link" class="form-control"
                                placeholder="Introduce el enlace de la tienda."  value="" required>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="imagenPoke" class="col-sm-2 col-form-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" name="imagenPoke" id="imagenPoke" class="form-control-file" placeholder="Imagen aqui" required>
                        </div>
                    </div>
                    <br>
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-light" name="insert">ACEPTAR</button>
                            <a href="./index.php" class="btn btn-danger">Cancelar</a>
    </div>



   