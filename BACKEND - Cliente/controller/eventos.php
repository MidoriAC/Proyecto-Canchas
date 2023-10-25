<?php
header('Content-Type: application/json');
include_once "../controller/conexion.php";

//Seleccionar Los eventos de la tabla Reservas de la BD
/*$sentencia = $pdo->prepare("SELECT dr.horainicio, dr.horafinal, dr.fechainicio, u.usuario AS usuariocreador
FROM detallereservacion AS dr
JOIN reservacion AS r ON dr.idreservacion = r.idreservacion
JOIN usuario AS u ON r.usuariocreador = u.idusuario");*/
//$sentencia = $pdo->prepare("SELECT * FROM eventos");
/*$sentencia = $pdo->prepare("SELECT
dr.idreservacion,
u.usuario,
dr.fechainicio,
dr.fechafin,
e.color,
e.textColor
FROM
detallereservacion AS dr
JOIN
reservacion AS r ON dr.idreservacion = r.idreservacion
JOIN
usuario AS u ON r.usuariocreador = u.idusuario
JOIN
eventos AS e ON e.start BETWEEN dr.fechainicio AND dr.fechafin");*/

$sentencia = $pdo->prepare("SELECT
e.id,
u.nombre AS usuario,
e.descripcion,
e.color,
e.textColor,
e.start,
e.end
FROM
eventos AS e
JOIN
usuario AS u ON e.idusuario = u.idusuario;");

$sentencia->execute();

$resultado= $sentencia->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>