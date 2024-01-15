<?php

require_once('../php_librarys/bdpokemon.php');



if (isset($_POST['insert'])) {
          // Obtiene información sobre la imagen cargada
          $imagenTmpPath = $_FILES['imagenPoke']['tmp_name'];
          $imagenNombre = $_FILES['imagenPoke']['name'];
  
        
          $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . "/coleccionM07/imgdata/";
  
   
          $imagenRuta = $carpetaDestino . $imagenNombre;
          move_uploaded_file($imagenTmpPath, $imagenRuta);
          $imagenRuta = str_replace($_SERVER['DOCUMENT_ROOT'], '', $imagenRuta);

    $numPokedex = $_POST['numPokedex'];
    $nombrePoke = $_POST['nombrePoke'];
    $idRegion = $_POST['idRegion'];
    $descripcion = $_POST['descripcion'];
    $coleccion = $_POST['coleccion'];
    $link =    $_POST['link'];

  
   


    $idPoke = insertPokemon($numPokedex, $nombrePoke, $idRegion, $descripcion,$imagenRuta,$coleccion, $link);
    if($idPoke===null) {


    }else{
        $selectedTipos = isset($_POST['tipos_seleccionados']) ? $_POST['tipos_seleccionados'] : [];
        insertTipoPoke($idPoke, $selectedTipos);

    }
   

     // Verifica si hay errores y redirige
     if (isset($_SESSION['error'])) {
        header('Location: ../webApp/addCartas.php');
        exit();
    } else {
        header('Location: ../webApp/index.php');
        exit();
    }

  
}




if (isset($_POST['delete'])) {
    try {
        deleteTipoPoke($_POST['idPoke']);
        deletePokemon($_POST['idPoke']);
     
        header('Location: ../webApp/index.php');
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }



    
} elseif (isset($_POST['update'])) {
    try {
        if (isset($_FILES['newimagenPoke']) && $_FILES['newimagenPoke']['size'] > 0 && $_FILES['newimagenPoke']['error'] == UPLOAD_ERR_OK) {
        $imagenTmpPath = $_FILES['newimagenPoke']['tmp_name'];
        $imagenNombre = $_FILES['newimagenPoke']['name'];

        // Define la carpeta de destino donde se almacenará la imagen
        $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . "/coleccionM07/imgdata/";

        // Combina la carpeta de destino y el nombre del archivo para obtener la ruta completa
        $imagenRuta = $carpetaDestino . $imagenNombre;
        move_uploaded_file($imagenTmpPath, $imagenRuta);
        $imagenRuta = str_replace($_SERVER['DOCUMENT_ROOT'], '', $imagenRuta);

        } else {
            $imagenRuta = getRutaimagen($_POST['idPoke']);
            
        }


       $idPoke= updatePokemon( $_POST['idPoke'],$_POST['newPokedex'],$_POST['newnombre'],$_POST['newidRegion'],$_POST['newdescripcion'],
        $_POST['newcoleccion'], $imagenRuta,$_POST['newlink']);

        $selectedTipos = isset($_POST['tipos_seleccionados']) ? $_POST['tipos_seleccionados'] : [];
        
        updateTipoPoke($idPoke,$selectedTipos);

    
         header('Location: ../webApp/index.php');
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}






// else if (isset($_POST['mod'])) {

// try { 
//     infomodpoke($_POST['idPoke']);
//     header('Location: ../webApp/modCartas.php');

// } catch (Exception $e) {
//     echo "Error: " . $e->getMessage();
// }

// }





    

  




    


























?>