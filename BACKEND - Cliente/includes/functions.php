<?php

require_once("db.php");




if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros

        case 'acceso_user';
            acceso_user();
            break;

        case 'editar_user':
            editar_user();
            break;

    }
}
/*------------------------
function obtenerIDUsuario($nombreUsuario)
{
    include "db.php";
    $nombreUsuario = $conexion->real_escape_string($nombreUsuario);
    $consulta = "SELECT id FROM usuario WHERE usuario = '$nombreUsuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila) {
            return $fila['id'];
        }
    }

    return null;
}
/* --------------------- */
function acceso_user()
{
    include("db.php");
    extract($_POST);

    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $password = $conexion->real_escape_string($_POST['password']);
    session_start();
    $_SESSION['nombre'] = $nombre;

    $consulta = "SELECT*FROM usuario where usuario='$nombre' and contraseña='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas) {
        $_SESSION['usuario_id'] = $filas['id'];
        $_SESSION['usuario_nombre'] = $filas['nombre'];
        header('Location: ../views/usuarios.php');
    } else {
        echo "<script language='JavaScript'>
        alert('Usuario o Contraseña Incorrecta');
        location.assign('./_sesion/login.php');
        </script>";
        
       
session_destroy();
    }

    if (isset($filas['idrol']) == 1) {

        header('Location: ../views/usuarios.php');


        if ($filas['idrol'] == 3) { //empleado


            header('Location: ../views/index.php');
        }
    } else {


        echo "<script language='JavaScript'>
        alert('Usuario o Contraseña Incorrecta');
        location.assign('./_sesion/login.php');|
        </script>";

        
        session_destroy();
    }
}





function editar_user()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE usuario SET usuario = '$usuario', nombre = '$nombre', contraseña = '$contraseña',
     idrol ='$rol' WHERE idusuario = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('El registro fue actualizado correctamente');
        location.assign('../views/usuarios.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/usuarios.php');
         </script>";
    }
}

