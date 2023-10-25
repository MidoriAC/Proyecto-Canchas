<?php
require_once("conexion.php");

function obtenerIDUsuarioPorNombre($nombreUsuario) {
    global $pdo; // Accede a la conexión PDO desde el archivo de conexión

    $consulta = "SELECT id FROM usuario WHERE nombre = :nombre";
    $statement = $pdo->prepare($consulta);
    $statement->bindParam(':nombre', $nombreUsuario, PDO::PARAM_STR);
    $statement->execute();

    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        return $row['id'];
    } else {
        return null; // Usuario no encontrado
    }
}




?>