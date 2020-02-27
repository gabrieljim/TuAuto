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
    <link rel="stylesheet" href="./assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <?php $selected = 'publicar';
                    include('sidebar.php')
                    ?>
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
                                    <form id="forma-publicar" enctype="multipart/form-data" role="form" action="guardar.php" method="POST">
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
                                                <input required name="descrip" class="form-control" style="height: 80px;" type="text" value="" id="descrip">

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
                                            <div class="gallery">
                                            </div>
                                            <input id="gallery-photo-add" required multiple name="userfile[]" type="file">


                                            <!--                                        <header class="section-header" style="padding-top: 10px;">-->
                                            <!--                                            <h2 class="text-center">Subir Fotos</h2>-->
                                            <!--                                            <p class="text-center"></p>-->
                                            <!--                                        </header>-->

                                            <input id="boton-enviar-forma" type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar" style="color: #000; background-color: #feee2c; height: 70px;  display: block; border: none;">

                                            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#miModalpublicacion" style="color: #fff; background-color: #000; margin-top: 20px; height: 70px;  display: block; border: none;">
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
    <div class="modal fade" id="miModalpublicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <button class="btn btn-default boton-adaptado" type="button"><span class="glyphicon glyphicon-step-bac"></span>Si
                                </button>
                                <button class="btn btn-default boton-adaptado" type="button">No<span class="glyphicon glyphicon-step-for"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .botones-modal {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 2px #ddd;
            font-size: 20px;
            transition: all 0.2s;
            background-color: white;
            user-select: none;
            width: 100%;

        }

        .boton-confirmar {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 2px #ddd;
            font-size: 20px;
            transition: all 0.2s;
            background-color: white;
            user-select: none;
            margin: auto;
        }

        .boton-confirmar:hover {
            background-color: #f0f0f059
        }

        .select-publication {
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-container {
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 10px;
            text-align: center;
            flex: 3;
            transition: all 0.2s;
        }

        .button-container * {
            pointer-events: none;
        }

        .button-container:hover {
            cursor: pointer;
        }

        .button-container:hover .botones-modal {
            background-color: #f0f0f059;
        }

        .activo-mano .botones-modal {
            background-color: #f0f0f059 !important;
            border: 1px solid gold;
            box-shadow: 0 0 4px gold;
            color: gold;
        }

        .modal-content {
            padding: 15px;
            text-align: center;
        }

        .cuerpo {
            width: 50%;
            margin: auto;
        }

        .select-publication .fa {
            font-size: 40px;
        }
    </style>

    <!-- modal para tipo de publicacion -->
    <div id="modal-tipo" class="modal fade">
        <div class="cuerpo">
            <div class="modal-content">

                <h1 class="modal-title">Tipo de Publicación</h1>

                <div class="select-publication">
                    <div class="button-container" data-publication-id="0">
                        <div class="botones-modal">
                            <i class="fa fa-bicycle"></i>
                            <p>Gratuita</p>
                        </div>
                    </div>
                    <div class="button-container" data-publication-id="1">
                        <div class="botones-modal">
                            <i class="fa fa-car"></i>
                            <p>Gold</p>
                        </div>
                    </div>
                    <div class="button-container" data-publication-id="2">
                        <div class="botones-modal">
                            <i class="fa fa-truck"></i>
                            <p>Premium</p>
                        </div>
                    </div>
                </div>
                <button class="boton-confirmar" id="button-confirm">Confirmar</button>
            </div>
        </div>
    </div>
    <!-- /. ROW  -->
    <footer>
        <p><a href="http://webthemez.com"></a></p>
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
    <!-- modal-tipo -->
    <script src="modal-tipo.js"></script>

</body>

</html>