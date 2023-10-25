<?php
include "../includes/header.php";
include "../includes/db.php";

error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];

if ($actualsesion == null || $actualsesion == '') {
    // Redirige al usuario o realiza alguna acción en caso de que no haya sesión activa.
}
?>

<?php
$sql = "SELECT usuario.idusuario, usuario.usuario, usuario.nombre, usuario.contraseña, roles.idrol FROM usuario LEFT JOIN roles ON usuario.idrol = roles.idrol  WHERE nombre = '$actualsesion'";
$usuarios = mysqli_query($conexion, $sql);

include "../includes/header.php";
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css" />
</head>

<body>

<section class="perfil-usuario">
    <div class="contenedor-perfil">
        <?php foreach ($usuarios as $fila) : ?>
            <div class="portada-perfil" style="background-image: url('../img/portada.jpg');">
                <div class="sombra"></div>
                <div class="avatar-perfil">
                    <img src="../img/undraw_profile.svg" alt="img">
                    <a href="#" class="cambiar-foto">
                        <i class="fas fa-camera"></i>
                        <span>(Próximamente)</span>
                    </a>
                </div>
                <div class="datos-perfil">
                    <h4 class="titulo-usuario"><?php echo $fila['nombre']; ?></h4>
                    <p class="bio-usuario">Sistema Administrativo de Reserva Tu Cancha</p>
                    <ul class="lista-perfil">
                        <li>Rol de usuario: <?php echo $fila['idrol']; ?></li>
                        <li>Nombre de usuario: <?php echo $fila['usuario']; ?></li>
                        <li>Contraseña: <?php echo $fila['contraseña']; ?></li>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="menu-perfil">
            <ul>
                <li><a href="#" title=""><i class="icono-perfil fas fa-info-circle"></i> Información</a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-grin"></i> Nombre</a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-camera"></i> Contraseña</a></li>
            </ul>
        </div>
    </div>
</section>
</body>
</html>

<?php include "../includes/footer.php"; ?>
