<?php
if (!isset($_SESSION)) {
    session_start();
}

include("usuario/consultas_generales.php");
include("escritorio/publicaciones.php");

$foto_banner = $row_user['foto_banner'];

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

    <link rel="stylesheet" type="text/css" href="css/centrar.css" />

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
                <img class="navbar-brand" style="width: 350px; cursor: pointer" src="imagenes/logo_sm.png" onClick="window.location='index.php';"><a class="navbar-brand" href="index.html"></a>
            </div>
        </nav>
        <!--/. NAV TOP  -->
        <!--/. NAV TOP  -->
        <?php if (!$_SESSION['rellenado']) : ?>
            <div id="page-wrapper" style="margin:0; min-height:0">
                <div id="page-inner" style="margin:0; min-height:0">
                    <div id="rellenar-datos">
                        <div id="usuario-empresa">
                            <h1>¿Qué tipo de usuario eres?</h1>
                            <div class="tarjetas">
                                <div class="tarjeta" data-tipo="usuario">
                                    <span class='fa fa-user'></span>
                                    <h1>Usuario</h1>
                                </div>
                                <div class="tarjeta" data-tipo="empresa">
                                    <span class='fa fa-building-o'></span>
                                    <h1>Empresa</h1>
                                </div>
                            </div>
                            <button id='send-user-type'>Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="assets/js/jquery-1.10.2.js"></script>
            <script src="assets/js/jsEscritorio.js"></script>
        <?php else : ?>
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <?php $selected = 'escritorio';
                        include('./sidebar.php') ?>
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">

                <?php if ($row_user['tipo_cliente'] == '1') { ?>
                    <div id="banner" style="background-image: url(<?= $foto_banner ?>); background-size:cover !important;"></div>
                <?php } ?>
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Mis Publicaciones</h2>
                            <div class="row" style="margin-top: 30px;">
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="carta centrarCaja">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <?php $contador = 1; ?>
                                                    <?php while ($row2 = mysqli_fetch_array($publi)) { ?>
                                                        <?php if ($contador == 5) {
                                                            $contador = 1;
                                                            echo "<br><br><tr>";
                                                        } ?>
                                                        <td>

                                                            <div class="card" style="padding: 7px; display: inline-block; cursor:pointer; width: 243px; border: solid 0.7px #ddd; margin-left: 5px; border-radius:5px;">
                                                                <img class="card-img-top" alt="Card image cap" style="height: 150px; width: 225px; border-radius:5px;" src="<?php echo $row2['imagen1']; ?>">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">
                                                                        <p style="font-size: 20px; margin-bottom: 25px;"><strong><?php echo number_format($row2['precio'], 0, ".", "."); ?>
                                                                                USD</strong></p>
                                                                    </h3>
                                                                </div>

                                                                <ul style="width: 39rem; padding-left:0px">
                                                                    <p style="line-height: 0; padding:2px">
                                                                        <?php echo number_format($row2['km'], 0, ".", ".") ?>Km</p>


                                                                    <p style="line-height:0; padding-bottom:10px">
                                                                        <?= $row2['marca'] . " " . $row2['modelo']; ?>
                                                                    </p>
                                                                </ul>
                                                                <div class="text-center" style="margin-bottom: 10px;">
                                                                    <button class="btn btn-primary center" onClick="mostrarVehi(<?php echo $row2['cod_vehiculo']; ?>), $('#miModaleditar').modal('show');">Editar</button>
                                                                    <button class="btn btn-danger center" onClick="eliminarVehi(<?php echo $row2['cod_vehiculo']; ?>), $('#miModalborrar').modal('show');">Eliminar</button>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                        </td>
                                                    <?php $contador = $contador + 1;
                                                    }  ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. PUBLICACIONES ROW  -->
            </div>
        <?php endif ?>
        <!-- /.FINAL PUBLICACION ROW  -->
    </div>

    <!-- /.modal borrar  -->

    <div class="modal fade" id="miModalborrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Borrar</h4>
                </div>
                <div class="modal-body" style="padding-bottom: 100px;">
                    ¿Desea eliminar esta publicación?

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

                        <div id="eliminar"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="miModaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 800px;">
                <div class="modal-header">

                    <!-- /. formulario publicacion  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="font-size: 30px;">
                                    Editar Publicación
                                </div>
                                <div class="panel-body">
                                    <div id="editar"></div>
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                    </div>
                </div>
            </div>
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