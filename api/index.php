<?php

require_once('../php_librarys/bdpokemon.php');

$pokemons = selectPokemons();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M07Coleccion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
  
    <?php



    include_once('../php_partials/navbar.php');



    ?>
</head>

<body style ="overflow: scroll">



    <!-- <?php require_once('../php_partials/mensajes.php'); ?> -->


    <div class="container ">
        <div class="row ">
            <?php
            foreach ($pokemons as $pokemon) {
                ?>

                <div class="col-md-6 col-lg-4 col-xl-3 col-sm-9 col-9">
                    <div class="card mb-4 card mb-4 carta-coleccion    " style="width: 250px    background-image: url('../media/carta/fondo.png'); background-image: url('../media/carta/fondo.png'); background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">


                        <div class="card-body d-flex align-items-center ">
                            <form action="../php_controllers/pokemonController.php" method="POST"
                                enctype="multipart/form-data">
                                <button style="position : relative; left: 0px; top : -4px;" type="submit" class="btn " name="delete"><img src="../media/carta/delete.png"
                                        alt="eliminar" class="imgcustom"></button>
                                <input type="hidden" name="idPoke" value="<?php echo $pokemon['idPoke'] ?>">
                                


                            </form>

                            <form action="../api/modCartas.php" method="POST" enctype="multipart/form-data">
                                <button style="position : relative; left: 10px; top : -4px;" type="submit" class="btn " name="mod"><img src="../media/carta/mod.png" alt="mod"
                                        class="imgcustom"></button>
                                <input type="hidden" size="1" name="idPoke" value="<?php echo $pokemon['idPoke'] ?>">
                                <input type="hidden" name="numPokedex" value="<?php echo $pokemon['numPokedex'] ?>">
                                <input type="hidden" name="nombrePokemon" value="<?php echo $pokemon['nombrePoke'] ?>">
                                <input type="hidden" name="descripcion" value="<?php echo $pokemon['descripcion'] ?>">
                                <input type="hidden" name="coleccion" value="<?php echo $pokemon['coleccion'] ?>">
                                <input type="hidden" name="link" value="<?php echo $pokemon['link'] ?>">
                                <input type="hidden" name="imagenPoke2" value="<?php echo $pokemon['imagenPoke'] ?>">
                            </form>
                        </div>



                        <h5 class="card-title text-end font-weight-bold " style="position: relative;
left: -130px; top: -10px;" >

                            <?php echo $pokemon['nombrePoke'] ?>
                            <p class ="font-weight-bold text-white" style="position : relative; left: 90px; top : -80px;"><?php echo $pokemon['numPokedex'] ?></p>
                            


                        </h5>
                        <img src="<?php echo $pokemon['imagenPoke']; ?>" alt="pokeimg"
                            class="card-img-top img-fluid"  style="height: 250px; width:400px;">

                        
                        <p class ="btn font-weight-bold ">  <?php echo $pokemon['region'] ?> </p>
                        <p  class="btn font-weight-bold" style="widht : 20px"><?php echo $pokemon['tipos']  ?> </p>
                        <div class="card-body" style="position :relative; left :40px">
                            
                            <a href="<?php echo $pokemon['link']; ?>" class="link-underline-opacity-0 link-danger font-weight-bold "> Tienda oficial</a>

                            <button class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        DETAILS
    </button>
                          



                            <div class="dropdown">
    
    <div class="dropdown-menu dropdown-menu-dark">
        <div>
            <p>Coleccion : <?php echo $pokemon['coleccion'] ?></p>
            <p>Descripcion : <br><?php echo $pokemon['descripcion'] ?></p>
        </div>
    </div>
</div>








                            

                        </div>
                    </div>
                </div>
            <?php } ?>


                     





        </div>
    </div>





    <script>document.addEventListener("DOMContentLoaded", function() {
    // Obtenemos todos los botones "DETAILS"
    let mostrarBotones = document.querySelectorAll(".mostrarBoton");

    mostrarBotones.forEach(function(boton) {
        boton.addEventListener("click", function() {
            // Buscamos el elemento hermano siguiente que es el div de descripción
            let descripcionDiv = boton.nextElementSibling;

            if (descripcionDiv.style.display === 'none' || descripcionDiv.style.display === '') {
                descripcionDiv.style.display = 'block';
            } else {
                descripcionDiv.style.display = 'none';
            }
        });
    });
});</script>
</body>

</html>