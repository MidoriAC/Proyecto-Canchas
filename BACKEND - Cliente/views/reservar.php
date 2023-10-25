<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];
if ($varsesion == null || $varsesion == '') {

    header("Location: ../includes/_sesion/login.php");
   die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
<script>
    // Puedes acceder a la variable nombreUsuario aquí en JavaScript
    console.log(nombreUsuario);
</script>

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

        <div class="contenedor3" id="contenedor3">
            <div class="misreservas">
                <div class="btn-reservar">
                    <button type="button" class="btn-c" class="btn btn-primary" data-toggle="modal" data-target="#modal_reservas">+</button> <a href=""data-toggle="modal" data-target="#modal_reservas">Reservar</a>
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
                                        <script src="../js/calendario/funcionescalendario_misreservas.js"></script>
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


  <!-- Modal Para Boton reservar-->
<div class="modal fade" id="modal_reservas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloEvento">Reservar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="descripcionEvento"></div>
          ID del Usuario: <?php echo  $_SESSION['id'] ?> <br>
          Usuario:<?php echo  $_SESSION['nombre'] ?></span><br>
          Fecha: <input type="date" id="txtFecha" name="txtFecha" /><br/>
          Hora Inicial: <input type="time" id="txtHoraInicial" value="10:30" /><br/> 
          Tiempo: <input type="number" id="txtTiempo" name="txtTiempo" min="30" max="100" /><br/>
          <form method="post" action="/send/">
            Cancha:
            <select>
              <option value="1">GOL_SEGURO</option>
              <option value="2">CANCHITA</option>
              <option value="3">GOL_DE_ORO</option>
            </select>
          </form>
          Descripción: <textarea id="txtDescripcion" rows="3"></textarea><br/>
        </div>
        <div class="modal-footer">
         <button type="button" id="btn-Confirmar" class="btn btn-success">Confirmar</button> <!--Con este COnfirmamos y damos paso al primer insert a la base de datos-->
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          
        </div>
      </div>
    </div>
  </div>
  <script src="../js/calendario/evento-modal.js"></script>


</body>


</html>