<?php
session_start();

function openDB()
{

    $servername = "localhost";
    $username = "root";
    $password = "mysql";


    $conexion = new PDO("mysql:host=$servername;dbname=pokemon", $username, $password);
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set names utf8");
    return $conexion;




}






function errorMessage($e)
{
    if (!empty($e->errorInfo[1])) {
        switch ($e->errorInfo[1]) {

            case 1062:
                $mensaje = 'Registro duplicado';
                break;
            case 1451:
                $mensaje = 'Registro con elementos duplicados';
                break;
            default:
                $mensaje = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                break;
        }
    } else {
        switch ($e->getCode()) {
            case 1044:
                $mensaje = 'Usuario y/o contraseña incorrectos';
                break;

            case 1049:
                $mensaje = 'Base de datos desconocida';
                break;
            case 2002:
                $mensaje = 'No se encuentra el servidor';
                break;
            default:
                $mensaje = $e->getCode() . ' - ' . $e->getMessage();
                break;
        }
    }

    return $mensaje; // Debes agregar un retorno para obtener el mensaje.
}


function closeDB()
{



    return null;
}




function selectPokemons()
{



    $conexion = openDB();


    $sentenciatext = "SELECT
    p.idPoke,
    p.numPokedex,
    p.nombrePoke,
    GROUP_CONCAT(DISTINCT tp.nombreTipo SEPARATOR '/') AS tipos,
    r.nombreRegion AS region,
    p.descripcion,
    p.coleccion,
    p.link,
    p.imagenPoke
FROM pokemon p
LEFT JOIN pokeTipoNM pt ON p.idPoke = pt.idPoke
LEFT JOIN tipoPokemon tp ON pt.idTipo = tp.idTipo
JOIN region r ON p.idRegion = r.IDregion

GROUP BY p.idPoke
ORDER BY numPokedex;";


    $sentencia = $conexion->prepare($sentenciatext);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();











    $conexion = closeDB();
    return $resultado;
}













function insertPokemon($numPokedex, $nombrePoke, $idRegion, $descripcion, $imagenPoke, $coleccion, $link)
{

    try {

        $conexion = openDB();
        $sentenciaText = "INSERT INTO pokemon (numPokedex, nombrePoke, idRegion,descripcion,imagenPoke,coleccion,link) 
    VALUES (:numPokedex, :nombrePoke, :idRegion,:descripcion,:imagenPoke,:coleccion,:link)";
        $sentencia = $conexion->prepare($sentenciaText);
        $sentencia->bindParam(':numPokedex', $numPokedex);
        $sentencia->bindParam(':nombrePoke', $nombrePoke);
        $sentencia->bindParam(':idRegion', $idRegion);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':imagenPoke', $imagenPoke);
        $sentencia->bindParam(':coleccion', $coleccion);
        $sentencia->bindParam(':link', $link);

        $sentencia->execute();

        $idPoke = $conexion->lastInsertId(); // Obtiene el valor autoincremental de idPoke
        $_SESSION['mensaje'] = ' Registrado  correctamente';
        return $idPoke;








    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
        $pokemon1['numPokedex'] = $numPokedex;
        $pokemon1['nombrePoke'] = $nombrePoke;


        $pokemon1['descripcion'] = $descripcion;
        $_SESSION['pokemon1'] = $pokemon1;




    }








    $conexion = closeDB();

}

function insertTipoPoke($idPoke, $selectedTipos)
{
    try {
        $conexion = openDB();

        
        foreach ($selectedTipos as $idTipo) {
            $sentenciaText = "INSERT INTO poketiponm (idPoke, idTipo) VALUES (:idPoke, :idTipo)";
            $sentencia = $conexion->prepare($sentenciaText);
            $sentencia->bindParam(':idPoke', $idPoke);
            $sentencia->bindParam(':idTipo', $idTipo);
            $sentencia->execute();
        }

       



    } catch (Exception $e) {
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeDB();
}








































function deletePokemon($idPoke)
{
    $conexion = openDB();
    $sentenciaText = "DELETE FROM pokemon WHERE idPoke = :idPoke ";
    $sentencia = $conexion->prepare($sentenciaText);
    $sentencia->bindParam(':idPoke', $idPoke);
    $sentencia->execute();
    $conexion = closeDB();
}


function deleteTipoPoke($idPoke)
{

    $conexion = openDB();
    $sentenciaText = "DELETE  FROM  poketiponm WHERE idPoke = :idPoke ";


    $sentencia = $conexion->prepare($sentenciaText);
    $sentencia->bindParam(':idPoke', $idPoke);

    $sentencia->execute();




    $conexion = closeDB();
}








function updatePokemon($idPoke, $nuevoPokedex, $nuevoNombre, $nuevaregion, $nuevadescripcion, $nuevacoleccion, $nuevaimagen, $nuevolink)
{   
    try {
        $conexion = openDB();
        $sentenciaText = "UPDATE pokemon 
                         SET numPokedex = :newPokedex, 
                             nombrePoke = :newnombrePoke,  
                             idRegion = :newRegion, 
                             descripcion = :nuevadescripcion, 
                             coleccion = :nuevacoleccion, 
                             imagenPoke = :nuevaimagen, 
                             link = :nuevolink 
                         WHERE idPoke = :idPoke";
        $sentencia = $conexion->prepare($sentenciaText);
        $sentencia->bindParam(':idPoke', $idPoke);
        $sentencia->bindParam(':newPokedex', $nuevoPokedex);
        $sentencia->bindParam(':newnombrePoke', $nuevoNombre);
        $sentencia->bindParam(':newRegion', $nuevaregion);
        $sentencia->bindParam(':nuevadescripcion', $nuevadescripcion);
        $sentencia->bindParam(':nuevacoleccion', $nuevacoleccion);
        $sentencia->bindParam(':nuevaimagen', $nuevaimagen);
        $sentencia->bindParam(':nuevolink', $nuevolink);
        $sentencia->execute();
        
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }
    $conexion = closeDB();
    return $idPoke;
    
}

function updateTipoPoke($idPoke, $selectedTipos)
{
    try {
        $conexion = openDB();

        // Start a transaction
        $conexion->beginTransaction();

      
        $deleteQuery = "DELETE FROM poketiponm WHERE idPoke = :idPoke";
        $deleteStatement = $conexion->prepare($deleteQuery);
        $deleteStatement->bindParam(':idPoke', $idPoke);
        $deleteStatement->execute();

        $insertQuery = "INSERT INTO poketiponm (idPoke, idTipo) VALUES (:idPoke, :idTipo)";
        $insertStatement = $conexion->prepare($insertQuery);

        foreach ($selectedTipos as $idTipo) {
            $insertStatement->bindParam(':idPoke', $idPoke);
            $insertStatement->bindParam(':idTipo', $idTipo);
            $insertStatement->execute();
        }

        
        $conexion->commit();

    } catch (Exception $e) {
        
        $conexion->rollback();
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeDB();
}





function searchPoke($busqueda) {
    $conexion = openDB();
    $sentenciatext = "
    
  
    SELECT DISTINCT
        pokemon.*,
        region.nombreRegion AS region,
        tipopokemon1.nombreTipo AS tipo1,
        tipopokemon2.nombreTipo AS tipo2
    FROM
        pokemon
        INNER JOIN poketiponm poketiponm1 ON poketiponm1.idPoke = pokemon.idPoke
        LEFT JOIN poketiponm poketiponm2 ON poketiponm2.idPoke = pokemon.idPoke AND poketiponm2.idTipo != poketiponm1.idTipo
        INNER JOIN tipopokemon tipopokemon1 ON tipopokemon1.idTipo = poketiponm1.idTipo
        LEFT JOIN tipopokemon tipopokemon2 ON tipopokemon2.idTipo = poketiponm2.idTipo
        INNER JOIN region ON region.IDregion = pokemon.idRegion
    WHERE
        (tipopokemon1.nombreTipo LIKE :busqueda OR tipopokemon2.nombreTipo LIKE :busqueda)
        OR pokemon.nombrePoke LIKE :busqueda
        OR pokemon.descripcion LIKE :busqueda
        OR pokemon.coleccion LIKE :busqueda
        OR region.nombreRegion LIKE :busqueda
    GROUP BY
        pokemon.idPoke;
";

    
    



    
    $sentencia = $conexion->prepare($sentenciatext);
    $parametro = "%$busqueda%";
    $sentencia->bindParam(':busqueda', $parametro, PDO::PARAM_STR);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    
    $conexion = closeDB();
    return $resultado;
}





function infomodpoke($idPoke)
{



    $conexion = openDB();


    $sentenciatext = "SELECT
    p.idPoke,
    p.numPokedex,
    p.nombrePoke,
    GROUP_CONCAT(DISTINCT tp.nombreTipo ORDER BY tp.idTipo SEPARATOR '/') AS tipos,
    r.nombreRegion AS region,
    r.IDregion as idRegion,
    p.descripcion,
    p.coleccion,
    p.link,
    p.imagenPoke,
    r.IDregion,
    GROUP_CONCAT(DISTINCT tp.idTipo ORDER BY tp.idTipo) AS idTipos
FROM pokemon p
LEFT JOIN pokeTipoNM pt ON p.idPoke = pt.idPoke
LEFT JOIN tipoPokemon tp ON pt.idTipo = tp.idTipo
JOIN region r ON p.idRegion = r.IDregion
where p.idPoke = :idPoke  

GROUP BY p.idPoke
ORDER BY numPokedex;";

    $sentencia = $conexion->prepare($sentenciatext);
    $sentencia ->bindparam(':idPoke', $idPoke);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();











    $conexion = closeDB();
    return $resultado;
}



function getTipos(){

$conn = openDB();
$sentenciatext = "select * from tipopokemon;";
$sentencia = $conn->prepare($sentenciatext);
$sentencia->execute();
$resultado = $sentencia->fetchAll();
$conexion = closeDB();
return $resultado;



}

function getRegiones(){
    $conn = openDB();
    $sentenciatext = "select * from region;";
    $sentencia = $conn->prepare($sentenciatext);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $conexion = closeDB();
    return $resultado;
    
    
    
    }


    function getRutaimagen($idPoke) {
        try {
            $conn = openDB();
            $sentenciatext = "SELECT imagenPoke FROM pokemon WHERE idPoke = :idPoke";
            $sentencia = $conn->prepare($sentenciatext);
            $sentencia->bindParam(':idPoke', $idPoke, PDO::PARAM_INT);
            $sentencia->execute();
    
            
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
    
           
            $conexion = closeDB();
    
            
            return $resultado ? $resultado['imagenPoke'] : 'ruta_por_defecto.jpg';
        } catch (PDOException $e) {
            
            echo "Error al obtener la ruta de la imagen: " . $e->getMessage();
            return 'ruta_por_defecto.jpg'; //
        }
    }
    



?>