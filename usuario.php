<?php if (!isset($_SESSION)) {
    session_start();
}

include("usuario/consultas_generales.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tuauto web</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script language="JavaScript" type="text/javascript" src="usuario/funciones.js"></script>


    <script type="text/javascript">
        /*función para tomar valores GET con js*/



        function obtenerValorParametro(sParametroNombre) {

            var sPaginaURL = window.location.search.substring(1);

            var sURLVariables = sPaginaURL.split('&');

            for (var i = 0; i < sURLVariables.length; i++) {

                var sParametro = sURLVariables[i].split('=');

                if (sParametro[0] == sParametroNombre) {

                    return sParametro[1];

                }

            }

            return null;

        }

        function foto() {

            $('#modal_articulo_imagen').modal('show');


        }
    </script>


</head>

<body>

    <!--Modal para preguntar si deseac desctivar usuario-->

    <div class="modal fade" id="miModal_desactivar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">¡ATENCIÓN!</h4>
                </div>
                <div class="modal-body" style="padding-bottom: 100px;">
                    ¿Deseas desactivar tu usuario?



                    <style>
                        .contenedor-botones {
                            display: block;
                            width: 100%;
                        }

                        .boton-adaptado {
                            width: 50%;
                        }
                    </style>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-9 text-right">
                            <div class="btn-group contenedor-botones text-center" role="group">
                                <button class="btn btn-default boton-adaptado" type="button" onClick="window.location='usuario/cerrarCuenta.php';"><span class="glyphicon glyphicon-step-bac"></span>Si</button>
                                <button class="btn btn-default boton-adaptado" type="button" onClick="$('#miModal_desactivar').modal('hide');">No<span class="glyphicon glyphicon-step-for"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--formulario para subir la imágen de perfil-->



    <!--<form action="usuario/imagen.php" enctype="multipart/form-data" method="post" class="form">-->
    <input type="hidden" name="referencia" value="" />
    <input type="hidden" name="imagen" value="TRUE" />
    <div class="modal fade" id="modal_articulo_imagen">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Imagen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- Contenido -->
                <div class="main py-2">
                    <form id="uploadimage" action="usuario/imagen.php" method="post" enctype="multipart/form-data">
                        <!-- <hr id="line" > -->
                        <div id="selectImage">
                            <div class="form-group px-5 py-2">
                                <label for="exampleFormControlFile1" class="mb-2">Selecciona una imagen</label>
                                <input type="file" class="form-control-file" id="file" name="file">
                            </div>
                            <div class="form-group mx-5">
                                <button type="submit" class="btn btn-submit mt-3">Cargar imagen</button>
                                <!-- <input type="submit" value="Cargar imagen" class="btn btn-submit mt-3" /> -->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Fin Contenido -->
            </div>
        </div>
    </div>
    <!--</form>-->





    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-brand" style="width: 350px; cursor: pointer" src="imagenes/logo_sm.png" onClick="window.location='index.php';"><a class="navbar-brand" href="index.html"></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>

                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">


                        <li><a href="usuario/close.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>



        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <div class="navbar"><img src="<?php echo $row_user['foto'] ?>" style="display: block; width:100px; height: 100px; border-radius: 100%; margin-top: 35px;margin-right: auto; margin-left: auto;">

                        <header class="section-header" style="padding-top: 5px;">
                            <h2 class="text-center" style="color: #fff; font-size: 18px;"><?php echo $row_user['correo'] ?></h2>
                            <p class="text-center" style="color: #fff;"><?php echo $row_user['tipo'] ?></p>
                        </header>


                    </div>
                    <li>
                        <a href="escritorio.php"><i class="fa fa-dashboard"></i>Escritorio</a>
                    </li>
                    <li>
                        <a href="usuario.php" class="active-menu"><i class="fa fa-user" style="font-size: 30px;"></i>Usuario</a>
                    </li>
                    <li>
                        <a href="publicar.php"><i class="fa fa-bar-chart-o"></i>Publicar</a>
                    </li>




                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            <small>Modifica tus datos de usuario</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. NAV SIDE  -->

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12" id="Paneluser">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="font-size: 30px;">
                                Datos de Usuario
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" name="actualizar" id="actualizar" action="usuario/actualizar.php" method="post">
                                            <div class="form-group" style="font-size: 18px;">
                                                <label>Nombres</label>
                                                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $row_user['nombre']; ?>">

                                            </div>

                                            <div class="form-group" style="font-size: 18px;">
                                                <label>Apellidos</label>
                                                <input class="form-control" type="text" id="apellido" name="apellido" value="<?php echo $row_user['apellido']; ?>">

                                            </div>

                                            <div class="form-group" style="font-size: 18px;">
                                                <label>E-mail</label>
                                                <input class="form-control" type="E-mail" id="correoElectronico" name="correo" readonly value="<?php echo $row_user['correo']; ?>">

                                            </div>

                                            <div class="form-group" style="font-size: 18px;">
                                                <label>Teléfono 1</label>
                                                <input type="" class="form-control" type="E-mail" id="telefono1" name="telefono1" value="<?php echo $row_user['telefono1']; ?>">

                                            </div>

                                            <div class="form-group" style="font-size: 18px;">
                                                <label>Teléfono 2</label>
                                                <input class="form-control" type="E-mail" id="telefono2" name="telefono2" value="<?php echo $row_user['telefono2']; ?>">

                                            </div>

                                            <div class="form-group" style="font-size: 18px;">
                                                <label>Pais</label>
                                                <select class="form-control" name="pais" id="pais">

                                                    <?php include "usuario/pais.php" ?>

                                                </select>
                                            </div>


                                            <div class="form-group" style="font-size: 18px;">

                                                <label for="es">ESTADO</label>

                                                <?php include "usuario/consultas_generales.php" ?>
                                                <select class="form-control" id="es" name="es" onchange="showselect5(this.value)">



                                                    <option value="<?php echo $row_user['cod_estado'] ?>" class="fuente"><?php echo $row_user['estado'] ?></option>
                                                    <?php include "usuario/estados.php" ?>

                                                </select>


                                            </div>



                                            <div class="form-group" style="font-size: 18px;">
                                                <label>Dirección</label>
                                                <input class="form-control" style="height: 80px;" type="text" id="direccion" name="direccion" value="<?php echo $row_user['direccion']; ?>">

                                            </div>
                                            <!--<button type="reset" style="font-size: 18px;" class="btn btn-default">Borrar Todo</button>-->
                                        </form>
                                    </div>


                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6" style="margin-top: 0px; padding-top: 80px;">

                                        <img src="<?php echo $row_user['foto'] ?>" style="display: block; width: 200px;  height: 200px; border-radius: 100%; margin-right: auto; margin-left: auto;">

                                        <p class="text-center" id="timagen" onClick="foto()" href="#" style="cursor: pointer;">Cambiar Foto</p>


                                        <header class="section-header" style="padding-top: 10px;">
                                            <h2 class="text-center"><?php echo $row_user['correo'] ?></h2>
                                            <p class="text-center"><?php echo $row_user['tipo'] ?></p>
                                        </header>


                                    </div>





                                    <div class="col-lg-6" style="padding-top: 50px; display: block;margin-left: auto;margin-right: auto;">

                                        <button type="button" onClick="document.actualizar.submit()" class="btn btn-primary btn-lg btn-block">Actualizar Datos</button>

                                        <!-- Indica una acción exitosa o positiva -->
                                        <a href="#" type="button" class="btn btn-warning btn-lg btn-block" onClick="mostrar(1)">Cambiar Contraseña</a>

                                        <!-- Botón pensado para los mensajes con alertas informativas -->
                                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#miModal_desactivar">Desactivar Usuario</button>


                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <!-- /.col-lg-12 -->
                    <div id="anclaPass"></div>
                    <div class="row" style="display: none" id="Panelpass">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="font-size: 30px;">
                                    Contraseña
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <form class="form-contrasena" name="formClave" id="formClave" action="usuario/updatePassword.php" method="POST">

                                                <div class="form-group" style="font-size: 18px;">
                                                    <label>Contraseña Actual</label>
                                                    <input type="password" class="form-control" type="text" onchange="actual(this.value)" required>

                                                </div>

                                                <div id="act"></div>

                                                <div class="form-group" style="font-size: 18px;">
                                                    <label>Nueva Contraseña</label>
                                                    <input class="form-control" type="password" id="clave2" name="clave2" required>

                                                </div>

                                                <div class="form-group" style="font-size: 18px;">
                                                    <label>Repetir Contraseña </label>
                                                    <input class="form-control" type="password" onChange="Figuales2()" id="repetir2" name="repetir2" required>

                                                </div>
                                                <div id="errorC2" style="display: none; color: darkred">Las contraseñas no son iguales</div>




                                                <button type="submit" style="font-size: 18px;" class="btn btn-default">Cambiar Contraseña</button>
                                            </form>
                                        </div>


                                        <div class="col-lg-6" style="margin-top: 0px; padding-top: 10px;">




                                            <div class="" style="padding-top: 50px; display: block;margin-left: auto;margin-right: auto;">


                                                <!-- Botón pensado para los mensajes con alertas informativas -->
                                                <a href="#" type="button" class="btn btn-danger btn-lg btn-block" onClick="mostrar(2)">CANCELAR</a>

                                            </div>




                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>

                        <!-- /.modal borrar  -->



                        <footer>
                            <p> </p>
                        </footer>
                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>
            <!-- /. WRAPPER  -->
            <!-- JS Scripts-->
            <!-- jQuery Js -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- Bootstrap Js -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- Metis Menu Js -->
            <script src="assets/js/jquery.metisMenu.js"></script>
            <!-- Morris Chart Js -->
            <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
            <script src="assets/js/morris/morris.js"></script>
            <!-- Custom Js -->
            <script src="assets/js/custom-scripts.js"></script>


</body>

</html>