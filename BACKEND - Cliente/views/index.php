<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {

    header("Location: ../includes/_sesion/login.php");
    die();
}


include_once "../controller/conexion.php";
$sentencia = $pdo->query("select nombre, CASE
WHEN estado = 1 THEN 'Libre'
WHEN estado = 2 THEN 'En Uso'
WHEN estado = 3 THEN 'Reservado'
ELSE 'Desconocido'
END AS Estado from cancha");
$cancha = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--AGREGADOS PARA EL CALENDARIO -->

    <link rel="stylesheet" href="../css/styles2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    

    <script src="../js/calendario/jquery.min.js"></script>
    <script src="../js/calendario/moment.min.js"></script>

    <!--FULL CALENDAR-->
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <script src="../js/calendario/fullcalendar.min.js"></script>
    <script src="../js/calendario/es.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    

</head>
<?php include "../includes/header.php"; ?>



<body id="page-top">
<!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="contenedor2" id="contenedor2">
            <div class="reservas">
                <div class="logo"> <h1>Reserva Tu Cancha</h1></div>
                    <div class="listado">
                    <div class="contenedorL">
                            <div class="row">
                                <div class="col-12">
                                                
                                                <br>
                                                <div class="table-responsive">
                                                <h1>Lista de Canchas</h1>
                                                <table class="mitabla">
                                                
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Cancha</th>
                                                                <th>Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($cancha as $nc){ ?>
                                                                <tr>
                                                                    <td><?php echo $nc->nombre ?></td>
                                                                    <td><?php echo $nc->Estado ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </div>
                                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  </div>
                  <div class="calendario">
                                    
                    <div class="calendarioT">
                        <div class="container">
                             <div class="row">
                                 <div class="col"></div>
                                    <div class="col7"><div id="CalendarioWeb"></div></div>
                                     <div class="col"></div>
                            </div>
                         </div>
                                        <!-- Script de las funciones del calendario -->
                                        <script src="../js/calendario/funcionescalendario.js"></script>
                    </div>
            </div>
        </div>
    


         <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloEvento">Agregar Titulo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
          <div id="descripcionEvento"></div>
        </div>
        <div class="modal-footer">
         <!-- <button type="button" class="btn btn-success">Agregar</button>
          <button type="button" class="btn btn-success">Modificar</button>
          <button type="button" class="btn btn-danger">Borrar</button> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          
        </div>
      </div>
    </div>
  </div>
</body>


</html>

