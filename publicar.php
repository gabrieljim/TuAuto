<?php if (!isset($_SESSION)) {
    session_start();
}

include("usuario/consultas_generales.php");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tuauto web</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

    <script language="JavaScript" type="text/javascript" src="escritorio/funciones.js"></script>

</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand" style="width: 350px; cursor: pointer" src="imagenes/logo_sm.png"
                 onClick="window.location='index.php';"><a class="navbar-brand" href="index.html"></a>
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
                    <li>
                        <a href="usuario/close.php" style="color: #000;"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
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

                <div class="navbar"><img src="<?php echo $row_user['foto'] ?>"
                                         style="display: block; width:100px; height: 100px; border-radius: 100%; margin-top: 35px;margin-right: auto; margin-left: auto;">

                    <header class="section-header" style="padding-top: 5px;">
                        <h2 class="text-center" style="color: #fff; font-size: 18px;"><?php echo $row_user['correo'] ?></h2>
                        <p class="text-center" style="color: #fff;"><?php echo $row_user['tipo'] ?></p>
                    </header>


                </div>
                <li>
                    <a href="escritorio.php"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li>
                    <a href="usuario.php"><i class="fa fa-user" style="font-size: 30px;"></i>Usuario</a>
                </li>
                <li>
                    <a href="publicar.php" class="active-menu"><i class="fa fa-bar-chart-o"></i>Publicar</a>
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
                        Publicar
                        <small>publica facil y vende</small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <!-- /. NAV SIDE  -->

            <!-- /. formulario publicacion  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-size: 30px;">
                            Datos de Publicación
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form enctype="multipart/form-data" role="form" action="guardar.php" method="POST">
                                    <div class="col-lg-6">
                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Marca</label>
                                            <select required name="marca" class="form-control" onChange="modelos(this.value)">
                                                <?php include("escritorio/marcas.php"); ?>
                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Modelo</label>
                                            <select required name="modelo" class="form-control" id="mod">
                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Combustible</label>
                                            <select required name="combust" class="form-control">

                                                <?php include("escritorio/combustible.php"); ?>

                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Puertas</label>
                                            <select required name="puertas" class="form-control">
                                                
                                                <?php include("escritorio/puertas.php"); ?>

                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Tipo de dirección</label>
                                            <select required name="tipodirec" class="form-control">

                                                <?php include("escritorio/dire.php"); ?>

                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Año</label>
                                            <select required name="ano" class="form-control">

                                                <?php include("escritorio/ano.php"); ?>

                                            </select>
                                        </div>


                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Tipo de Vehiculo</label>
                                            <select required name="tipovehi" class="form-control">

                                                <?php include("escritorio/tipo_vehi.php"); ?>

                                            </select>
                                        </div>


                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Estado</label>
                                            <select required name="estado" class="form-control">

                                                <?php include("usuario/estados.php"); ?>

                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Color</label>
                                            <select required name="color" class="form-control">

                                                <?php include("escritorio/color.php"); ?>

                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Transmisión</label>
                                            <select required name="transm" class="form-control">

                                                <?php include("escritorio/transmision.php"); ?>

                                            </select>
                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Condición</label>
                                            <select required name="condic" class="form-control">

                                                <?php include("escritorio/condi.php"); ?>

                                            </select>
                                        </div>


                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Descripcion</label>
                                            <input required name="descrip" class="form-control" style="height: 80px;" type="text" value=""
                                                   id="descrip">

                                        </div>
                                        <div id="editar"></div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>KM</label>
                                            <input required name="km" class="form-control" style="" type="text">

                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Precio</label>
                                            <input required name="precio" class="form-control" style="" type="text">

                                        </div>

                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Financiamiento</label>
                                            <select required name="finan" class="form-control">

                                                <option value="1">SI</option>
                                                <option value="2">NO</option>

                                            </select>
                                        </div>


                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Publicación Activa</label>
                                            <select required name="activo" class="form-control">

                                                <option value="1">SI</option>
                                                <option value="2">NO</option>

                                            </select>
                                        </div>


                                        <div class="form-group" style="font-size: 18px;">
                                            <label>Negociable</label>
                                            <select required name="negociable" class="form-control">

                                                <option value="1">SI</option>
                                                <option value="2">NO</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6" style="margin-top: 0px; padding-top: 80px;">
                                        <img src="1.jpg" style="width: 250px; height: 200px;">
                                        <img src="1.jpg" style="width: 250px; height: 200px;">
                                        <img src="1.jpg" style="width: 250px; height: 200px;">
                                        <img src="1.jpg" style="width: 250px; height: 200px;">
                                        <input required multiple name="userfile[]" type="file">


<!--                                        <header class="section-header" style="padding-top: 10px;">-->
<!--                                            <h2 class="text-center">Subir Fotos</h2>-->
<!--                                            <p class="text-center"></p>-->
<!--                                        </header>-->

                                        <input type="submit" class="btn btn-primary btn-lg btn-block"
                                                style="color: #000; background-color: #feee2c; height: 70px;  display: block; border: none;">

                                        <button type="button" class="btn btn-primary btn-lg btn-block"
                                                data-toggle="modal"
                                                data-target="#miModalpublicacion"
                                                style="color: #fff; background-color: #000; margin-top: 20px; height: 70px;  display: block; border: none;">
                                            Cancelar Publicación
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
<div class="modal fade" id="miModalpublicacion" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Borrar</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 100px;">
                ¿Desea cancelar la publicación?


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
                            <button class="btn btn-default boton-adaptado" type="button"><span
                                        class="glyphicon glyphicon-step-bac"></span>Si
                            </button>
                            <button class="btn btn-default boton-adaptado" type="button">No<span
                                        class="glyphicon glyphicon-step-for"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /. ROW  -->
<footer><p><a href="http://webthemez.com"></a></p></footer>
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