<?php
if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['pais'] = 3;

include("consultas/consultasGenerales.php");

?>

<!doctype html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">





    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>TUAUTOWEB</title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/fuente.css" />
    <link rel="stylesheet" type="text/css" href="css/centrar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Favicon -->
    <link rel="shortcut icon" type="imagenes/png" href="imagenes/favicon.png" />
    <!-- //Favicon -->
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script language="JavaScript" type="text/javascript" src="galeria.js"></script>
    <script language="JavaScript" type="text/javascript" src="funciones.js"></script>
    <script language="JavaScript" type="text/javascript" src="usuario/funciones.js"></script>

    <script>
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

        function tomar() {

            var valor = obtenerValorParametro('invalid');

            if (valor) {

                $('#inicio').modal('show');
                document.getElementById('usuarioInvalid').style.display = 'block';
                document.getElementById('usuarioActivo').style.display = 'none';
                document.getElementById('usuarioValido').style.display = 'none';


            } else {

            }

            var valor = obtenerValorParametro('activo');

            if (valor) {

                $('#inicio').modal('show');
                document.getElementById('usuarioActivo').style.display = 'block';
                document.getElementById('usuarioInvalid').style.display = 'none';
                document.getElementById('usuarioValido').style.display = 'none';


            } else {

            }

            var valor = obtenerValorParametro('valido');

            if (valor) {

                $('#inicio').modal('show');
                document.getElementById('usuarioActivo').style.display = 'none';
                document.getElementById('usuarioInvalid').style.display = 'none';
                document.getElementById('usuarioValido').style.display = 'block';


            } else {

            }


            var valor = obtenerValorParametro('registro');

            if (valor) {
                $('#aviso').modal('show');
                document.getElementById('bienvenida').style.display = 'block';
                document.getElementById('recupera').style.display = 'none';
                document.getElementById('validado').style.display = 'none';


            } else {

            }

            var valor2 = obtenerValorParametro('recupe');

            if (valor2) {
                $('#aviso').modal('show');
                document.getElementById('bienvenida').style.display = 'none';
                document.getElementById('recupera').style.display = 'block';
                document.getElementById('validado').style.display = 'none';
            } else {

            }

            var valor3 = obtenerValorParametro('validado');

            if (valor3) {
                $('#aviso').modal('show');
                document.getElementById('bienvenida').style.display = 'none';
                document.getElementById('recupera').style.display = 'none';
                document.getElementById('validado').style.display = 'block';
            } else {

            }


        }
    </script>


</head>

<body onLoad="tomar()">
    <nav class="navbar nav-fill navbar-expand-xl navbar-light bg-ligh px-4">
        <div class="navbar-brand w-50" rel="home" href="#" onclick="ShowTab('home')">
            <img class="navbar-logo ko" src="logo/logo_sm.png">
            &nbsp
            &nbsp

            <?php

            if ($_SESSION['pais'] == 1) {
                $ban = "iconos/arge.png";
            };

            if ($_SESSION['pais'] == 2) {
                $ban = "iconos/chile.png";
            };

            if ($_SESSION['pais'] == 3) {
                $ban = "iconos/uru.png";
            };


            ?>

            <img src="<?php echo $ban; ?>" class="tuyo" style=" cursor:default; width: 25px; height: 25px;">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-content-center" id="navbarSupportedContent">
            <div class="search" action="action_page.php">
                <input class="my-auto fuente" type="text" placeholder="Buscar.." name="search" id="search" onKeyPress="ShowTab('publish')">
                <button onclick="ShowTab('publish'), MostrarConsulta('consultas/consulta.php?busqueda=2017'); return false">
                    <i class="fa fa-search"></i></button>
            </div>
            <ul class="navbar-nav mr-auto w-100 align-content-center">
                <li class="nav-item">
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <a class="nav-link fuentebold" style="color: #000; padding-top: 16px;" href="/publicar.php"><strong> PUBLICA</strong></a>
                    <?php } else { ?>

                        <a class="nav-link fuentebold" style="color: #000; padding-top: 16px;" href="#" onclick="ShowTab('publicar')" data-toggle="tab"><strong> PUBLICA</strong></a>
                    <?php } ?>
                </li>
                <!--<li class="nav-item">
      <a class="nav-link" onclick="ShowTab('log-in')" href="#">INGRESA</a>
    </li>-->
                <li class="nav-item">
                    <a class="nav-link fuentebold" style="color: #000; padding-top: 16px;" data-toggle="modal" data-target="#registro" onClick="$('#inicio').modal('hide');" href="#"><strong>CREA TU
                            CUENTA</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fuentebold" style="color: #000; padding-top: 16px;" onclick="ShowTab('help')" href="#"><strong>AYUDA</strong></a>
                </li>
                <li class="nav-item">

                    <?php if (isset($_SESSION['usuario'])) { ?>

                        <img class="" style="cursor: pointer; background-color: #fff" src="<?php echo $_SESSION["imagen"]; ?>" width="50" height="50" onClick="window.location='escritorio.php';" />

                    <?php } else { ?>
                        <img class="" style="cursor: pointer; width: 30%; padding-top: 3px;" src="user.png" data-toggle="modal" data-target="#inicio" />


                    <?php } ?>

                </li>
            </ul>
        </div>
    </nav>

    <ul class="nav nav-tabs text-hide">
        <li><a href="#home" data-toggle="tab"></a></li>
        <li><a href="#publish" data-toggle="tab"></a></li>
        <li><a href="#publicar" data-toggle="tab"></a></li>
        <li><a href="#info" data-toggle="tab"></a></li>
        <li><a href="#us" data-toggle="tab"></a></li>
        <li><a href="#contact" data-toggle="tab"></a></li>
        <li><a href="#sign-in" data-toggle="tab"></a></li>
        <li><a href="#log-in" data-toggle="tab"></a></li>
        <li><a href="#help" data-toggle="tab"></a></li>
    </ul>

    <!--ventana modal inicio de sesion-->
    <div class="modal fade" id="inicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div id="Contenedor">
                        <div class="Icon">
                            <!--Icono de usuario-->
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="ContentForm">
                            <form action="usuario/login.php" method="post" name="FormEntrar">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo" id="Correo" aria-describedby="sizing-addon1" required>
                                </div>
                                <br>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="contra" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
                                </div>
                                <br>

                                <button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar
                                </button>


                                <div class="opcioncontra" data-toggle="modal" data-target="#claveO" onClick="$('#inicio').modal('hide');"><a href="#">¿Olvidaste tu contraseña?</a>
                                </div>

                                <a class="opcioncontra" data-toggle="modal" data-target="#registro" onClick="$('#inicio').modal('hide');" href="#"><strong>Regístrate</strong></a>

                                <div id="usuarioInvalid" style="color: firebrick; display: none">El usuario o contraseña
                                    con incorrectos.
                                </div>
                                <div id="usuarioActivo" style="color: firebrick; display: none">El usuario no se
                                    encuentra activo, por favor comunícate con nuestro soporte.
                                </div>
                                <div id="usuarioValido" style="color: firebrick; display: none">Aún no ha validado su
                                    correo, por favor valide su correo para que pueda acceder a nuestro sistema.
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--fin ventana modal-->


    <!--------------------Modal para clave olvidada--------------------->
    <div class="modal fade" id="claveO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Recuperación de Contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div id="Contenedor">

                        <div class="ContentForm">

                            <form action="usuario/recuClave.php" method="post" name="FormEntrar" id="FormEntrar">
                                <p>Por favor introduzca el correo electrónico asociado a su cuenta</p>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" id="razon" aria-describedby="sizing-addon1" required onchange="usuarioE2(this.value)">
                                </div>
                                <br>
                                <div id="existe2">
                                </div>
                                <br>
                                <button class="btn btn-principal" id="IngresoLog" type="submit">Enviar</button>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--fin ventana modal-->

    <!--ventana modal registro-->
    <div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Regístrate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div id="Contenedor">
                        <div class="Icon">
                            <!--Icono de usuario-->
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="ContentForm">

                            <form action="usuario/registro.php" method="post" name="FormEntrar" id="FormEntrar">

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" class="form-control" name="nombre_apellido" placeholder="Nombre" id="nombre_apellido" aria-describedby="sizing-addon1" required>
                                </div>
                                <br>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" id="correo" aria-describedby="sizing-addon1" required onchange="usuarioE(this.value)">
                                </div>
                                <br>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña" id="contraseña" aria-describedby="sizing-addon1" required>
                                </div>
                                <br>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="password" class="form-control" name="repetir" id='repetir' placeholder="Repetir Contraseña" id="repetir_contraseña" aria-describedby="sizing-addon1" required onChange="Figuales()">
                                </div>
                                <br>
                                <div class="input-group input-group-lg">

                                    <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>

                                </div>
                                <div id="errorC" style="display: none; color: crimson">Las contraseñas no son iguales
                                </div>
                                <div id="existe"></div>
                                <br>
                                <button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Enviar
                                </button>
                                <br>
                                <div class="opcioncontra" data-toggle="modal" data-target="#inicio" onClick="$('#registro').modal('hide');" href="#"><a href="#">Iniciar Sesión</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--fin ventana modal-->

    <div class="tab-content">
        <div id="home" class="tab-pane fade-in active" style="width: 100%;">
            <div id="carouselExampleFade" style=" padding-right: auto; padding-left: auto; display: block;" class="carousel slide carousel-fade up" data-ride="carousel" style="width: 100%;">
                <div class="banner carousel-inner rounded mx-auto d-block" style="width: 100%; height: 100%">
                    <div class="carousel-item active">
                        <figure class="tint tint-gray">
                            <img class="d-block w-100 img-fluid" src="fotos/fo1.jpg" alt="Responsive image First slide">
                        </figure>
                    </div>
                    <div class="carousel-item">
                        <figure class="tint tint-gray">
                            <img class="d-block w-100 img-fluid" src="fotos/fo2.jpg" alt="Responsive image Second slide">
                        </figure>
                    </div>
                    <div class="carousel-item">
                        <figure class="tint tint-gray">
                            <img class="d-block w-100 img-fluid" src="fotos/fo3.jpg" alt="Responsive image Third slide">
                        </figure>
                    </div>
                    <div class="centered-above w-100">
                        <h4 class="m-5 fuenteblancoslider">TUAUTOWEB</h4>
                        <h1 class="fuenteblancoslider2">VENDE TU AUTO DE LA MEJOR MANERA</h1>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="filter-bar my-3 text-left" style="margin-top:-100px;">
                <div class="mx-5 padre radio centered px-5 container" style="width: 1430px; padding-top: 10px; margin-top:-200px; background-color:#ffef20; border-radius: 5px;">
                    <h5 class="fuente" style="color:black; font:'bold', Arial, sans-serif">BÚSQUEDA AVANZADA</h5>
                    <div class="filters dark-border">
                        <div class="select-container d-flex text-white align-self-center">

                            <div class="flex-fill p-2 fuente">
                                <select name="ubi" id="ubi" class="fuente">

                                    <option value="">UBICACIÓN</option>
                                    <?php include "consultas/ubicacion.php" ?>

                                </select>
                            </div>
                            <div id="tipo" class="flex-fill p-2 fuente ">
                                <?php include "consultas/tipoSearch.php" ?>
                            </div>

                            <div id="marca" class="flex-fill p-2 fuente">
                                <?php include "consultas/marcaSearch.php" ?>
                            </div>

                            <div id="modelo" class="flex-fill p-2 fuente">
                                <select name="modelo" id="modelo" class="fuente">

                                    <option value="">MODELO</option>
                                </select>
                            </div>
                            <div id="trans" class="flex-fill p-2 fuente">
                                <?php include "consultas/transSearch.php" ?>
                            </div>

                            <div class="vertical-line "></div>

                            <button id="boton-busqueda" class="hij dark-border fuentebold" onclick="ShowTab('publish'), busqueda(); return false;">BUSCAR
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container text-center col-md-4 col-sm-6 col-md-8 " style=" display: inline; ">
                <div class="logos goha" style="padding-top: 60px;width: 100%; margin-top: 0px;">
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=50'); return false" src="marcas/over/marcas_over-01.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=6'); return false" src="marcas/over/marcas_over-02.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=2'); return false" src="marcas/over/marcas_over-03.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=17'); return false" src="marcas/over/marcas_over-04.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=16'); return false" src="marcas/over/marcas_over-05.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=37'); return false" src="marcas/over/marcas_over-06.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=41'); return false" src="marcas/over/marcas_over-07.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=36'); return false" src="marcas/over/marcas_over-08.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=28'); return false" src="marcas/over/marcas_over-09.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=10'); return false" src="marcas/over/marcas_over-10.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=34'); return false" src="marcas/over/marcas_over-11.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=49'); return false" src="marcas/over/marcas_over-12.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=38'); return false" src="marcas/over/marcas_over-13.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=23'); return false" src="marcas/over/marcas_over-14.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=3'); return false" src="marcas/over/marcas_over-15.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=14'); return false" src="marcas/over/marcas_over-16.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=43'); return false" src="marcas/over/marcas_over-17.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=47'); return false" src="marcas/over/marcas_over-18.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=27'); return false" src="marcas/over/marcas_over-19.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=33'); return false" src="marcas/over/marcas_over-20.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=22'); return false" src="marcas/over/marcas_over-21.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=5'); return false" src="marcas/over/marcas_over-22.png"></div>
                    <div class="slide"><img style="cursor: pointer" onclick="ShowTab('publish'), MostrarConsulta('consultas/consultaM.php?m=8'); return false" src="marcas/over/marcas_over-23.png"></div>
                </div>

                <div class="container opt-icons">
                    <div class="row justify-content-md-center" style="padding-top: 35px;">
                        <div class="card-deck my-5" style=" width: 100%;">

                            <div class="col-md-4">
                                <div class="card bg-light mb-3 ip">

                                    <div class="card-header fuentebold">REGÍSTRATE</div>
                                    <div class="card-body">
                                        <a class="opcioncontra" data-toggle="modal" data-target="#registro" onClick="$('#inicio').modal('hide');" href="#"><img class="mb-5 publ cent" src="iconos/iconosjk-01.png"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-light mb-3">
                                    <div class="card-header fuentebold">MONITOREA</div>
                                    <div class="card-body">
                                        <a class="opcioncontra" onclick="ShowTab('publish'), MostrarConsulta('consultas/consulta.php'); return false" href="#"><img class="mb-5 publ cent" src="iconos/iconosjk-02.png">
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="card bg-light mb-3 ip">
                                    <div class="card-header fuentebold">VENDE</div>
                                    <div class="card-body">
                                        <?php if (isset($_SESSION['usuario'])) { ?>
                                            <a class="opcioncontra" href="/publicar.php">
                                                <img class="mb-5 publ cent" src="iconos/iconosjk-03.png">
                                            </a>
                                        <?php } else { ?>
                                            <a class="opcioncontra" data-toggle="modal" data-target="#inicio" onClick="$('#inicio').modal('show');" href="#">
                                                <img class="mb-5 publ cent" src="iconos/iconosjk-03.png">
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- <div class="gray-border opt-icons my-5 p-4">
      <ul class="list-inline">
        <li class="list-inline-item">
          <div class="mx-0 mx-md-5">

          </div>
        </li>
        <li class="list-inline-item">
          <div class="mx-0 mx-md-5">

          </div>
        </li>
        <li class="list-inline-item">
          <div class="mx-0 mx-md-5">

          </div>
        </li>
      </ul>
    </div> -->

                <style type="text/css">
                    .col-xs-15,
                    .col-sm-15,
                    .col-md-15,
                    .col-lg-15 {
                        position: relative;
                        min-height: 1px;
                    }

                    .col-xs-15 {
                        width: 20%;
                        float: left;
                    }


                    @media (min-width: 768px) {
                        .col-sm-15 {
                            width: 20%;
                            float: left;
                        }
                    }

                    @media (min-width: 1024px) {
                        .col-md-15 {
                            width: 20%;
                            float: left;
                        }
                    }

                    @media (min-width: 1000px) {
                        .col-lg-15 {
                            width: 20%;
                            float: left;
                        }
                    }
                </style>

                <!--COLUMNAS ULTIMAS PUBLICACIONES CON HTML-->

                <center>
                    <div class="container" style="float:center">
                        <div class="row">
                            <h2 class="col-12 my-5 fuentebold3"><strong> ÚLTIMAS PUBLICACIONES</strong></h2>
                            <?php while ($row = mysqli_fetch_array($ultimos)) { ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card" style="cursor:pointer" onClick="abre(<?php echo $row['cod_vehiculo'] ?>)">
                                        <div style="margin:1em;">
                                            <img class="card-img-top" style="cursor:pointer; height:150px; width: 225px;" onClick="abre(<?php echo $row['cod_vehiculo'] ?>)" src="<?php echo $row['imagen1']; ?>" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5><strong class="card-title" style="float: left; margin-left: -40px;"><?php echo number_format($row['precio'], 0, ".", "."); ?>
                                                    USD</strong></h5>
                                            <p class="card-text" style="float: left; margin-left: -40px;">
                                                <?php echo $row['ano'] ?>
                                                <?php echo number_format($row['km'], 0, ".", "."); ?>Km</p>
                                            <p class="card-text" style="float: left; margin-left: -40px;">
                                                <?php echo $row['marca']; ?> <?php echo $row['modelo']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </center>


                <!--COLUMNAS MAS POPULARES CON HTML-->

                <center>
                    <div class="container" style="float: center">
                        <div class="row">
                            <h2 class="col-12 my-5  fuentebold3"><strong> MÁS POPULARES</strong></h2>
                            <?php while ($row2 = mysqli_fetch_array($po)) { ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card " style="cursor:pointer" onClick="abre(<?php echo $row2['cod_vehiculo'] ?>)">
                                        <div style="margin:1em;">
                                            <img class="card-img-top" style="cursor:pointer; height:150px; width: 225px;" onClick="abre(<?php echo $row2['cod_vehiculo'] ?>)" src="<?php echo $row2['imagen1']; ?>" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5><strong class="card-title" style="float: left; margin-left: -40px;"><?php echo number_format($row2['precio'], 0, ".", "."); ?>
                                                    USD</strong></h5>
                                            <p class="card-text" style="float: left; margin-left: -40px;">
                                                <?php echo $row2['ano'] ?>
                                                <?php echo number_format($row2['km'], 0, ".", "."); ?>Km</p>
                                            <p class="card-text" style="float: left; margin-left: -40px;">
                                                <?php echo $row2['marca']; ?> <?php echo $row2['modelo']; ?></p>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </center>
            </div>
        </div>

        <div id="sign-in" class="tab-pane fade-in">
            <div class="sign-in">
                <figure class="tint tint-yellow-light">
                    <img class="w-100" src="fotos/fo1.jpg">
                </figure>
                <div class="centered-above container">
                    <div class="row">
                        <div class="col-5">
                            <h4 class="fuentebold">REGÍSTRATE</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <h4>INGRESA</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col-7 px-5 fuentebold">
                            <p>Nombres</p>
                            <input type="text" placeholder="" name="name">
                            <p>Apellidos</p>
                            <input type="text" placeholder="" name="lname">
                            <p>E-Mail</p>
                            <input type="text" placeholder="" name="Email">
                            <p>Contraseña</p>
                            <input type="text" placeholder="" name="pwd">
                            <p>Repetir Contraseña</p>
                            <input type="text" placeholder="" name="rpwd">
                            <div class="w-100 row">
                                <input class="col-2" type="checkbox" name="agree">Estoy de acuerdo con los términos y
                                condiciones
                            </div>
                            <div class="text-center row">
                                <button class="w-auto px-4 mx-auto col-4" onclick="ShowTab('log-in')">INGRESAR</button>
                                <p class="float-center">O</p>
                                <button class="w-auto px-4 mx-auto col-4 gray">REGISTRARSE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="publish" class="tab-pane fade-in container show-top-margin separate-rows tall-rows">
            <div id="resultado" class="row p-4">
                <div class="card-deck">
                </div>
            </div>
        </div>

        <!--    PAGINA QUE MUESTRA EL BOTON DE PUBLICAR (PUBLICAR RAPIDO) -->
        <div id="publicar" class="tab-pane fade-in container show-top-margin separate-rows tall-rows">
            <div id="resultadoPublicar" class="row pt-5 pb-4">
                <h2>Publica Facil y Vende</h2>
            </div>
            <form enctype="multipart/form-data" role="form" action="publicaRapido.php" method="POST">
                <div class="row">
                    <div class="col-6 px-4 fuentebold">
                        <h3>Datos del Usuario</h3>
                        <hr>
                        <p>E-Mail</p>
                        <input type="text" class="form-control" name="correo" placeholder="Coloca tu email" id="correo" aria-describedby="sizing-addon1" required>
                        <p>Número de Teléfono</p>
                        <input type="text" class="form-control" name="nroTelefono" placeholder="Coloca tu número de teléfono" id="nroTelefono" aria-describedby="sizing-addon1" required>
                        <p>Dirección</p>
                        <input type="text" class="form-control" name="direccion" placeholder="Coloca tu dirección" id="direccion" aria-describedby="sizing-addon1" required>
                        <p>Contraseña</p>
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" id="contrasena" aria-describedby="sizing-addon1" required>
                        <p>Repetir Contraseña</p>
                        <input type="password" class="form-control" name="contrasena2" placeholder="Repite la Contraseña" id="contrasena2" aria-describedby="sizing-addon1" required>
                    </div>
                    <div class="col-6 px-4 fuentebold mb-4">
                        <h3>Datos del Carro</h3>
                        <hr>
                        <p>Marca</p>
                        <select required name="marca" class="form-control mb-3" onChange="modelos(this.value)">
                            <?php include("escritorio/marcas.php"); ?>
                        </select>
                        <p>Modelo</p>
                        <select required name="modelo" class="form-control mb-3" id="mod">
                        </select>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="ano">Año </label>
                                <select required id="ano" name="ano" class="form-control mb-3"> <?php include("escritorio/ano.php"); ?> </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="mtr">Matricula </label>
                                <input type="text" class="form-control" name="mtr" placeholder="Coloque la Matricula" id="mtr" aria-describedby="sizing-addon1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Kilometraje</label>
                                <input type="text" class="form-control" name="km" placeholder="Coloque el Kilometraje" id="km" aria-describedby="sizing-addon1" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Precio</label>
                                <input type="text" class="form-control" name="precio" placeholder="Coloque el precio" id="precio" aria-describedby="sizing-addon1" required>
                            </div>
                        </div>
                        <label>Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Coloque su descripcion" id="descripcion"></input>
                        <p>Fotos</p>
                        <input required multiple name="photosCar[]" type="file">
                        <br>
                        <input type="submit" class="btn btn-primary btn-lg btn-block mt-5" style="color: #000; background-color: #feee2c; height: 70px; display: block; border: 1px; padding-top:5px" value="PUBLICAR">
                    </div>
                </div>
            </form>
        </div>
        <!--    TERMINA LA SECCION DE PUBLICAR RAPIDO -->

        <div id="info" class="tab-pane fade-in container">
            <div id="resul2" class="row">
            </div>
            <!-- <div class="row popular mb-5">
            <h1 class="col-12 my-5 text-center">BUSQUEDAS RELACIONADAS</h1>
            <div class="col-4">
                <img src="fotos/carro2.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="col-4">
                <img src="fotos/carro2.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="col-4">
                <img src="fotos/carro2.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div> -->
        </div>

        <div id="us" class="tab-pane fade-in">
            <div class="us">
                <figure class="tint tint-yellow">
                    <img class="w-100" src="fotos/fo1.jpg">
                </figure>
                <div class="centered fuenteblanco">
                    <h1>NOSOTROS</h1>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor
                        sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                        qui officia deserunt mollit anim id est laborum.</h3>
                </div>
            </div>
        </div>

        <div id="contact" class="tab-pane fade-in">
            <div class="contact">
                <div>
                    <figure class="tint tint-yellow-light">
                        <img class="w-100" src="fotos/fo1.jpg">
                    </figure>
                </div>
                <div class="centered-above container">
                    <div class="row">
                        <div class="col-md-6 col-12 fuenteblanco">
                            <h4>CONTÁCTANOS</h4>
                            <p class="fuenteblanco">Nombre y Apellido (Requerido)</p>
                            <input type="text" placeholder="" name="name">
                            <p>Email (Requerido)</p>
                            <input type="text" placeholder="" name="Email">
                            <p>Mensaje (Requerido)</p>
                            <textarea name="ms" cols="40" rows="5"></textarea>
                        </div>
                        <div class="col-md-3 col-12 fuenteblanco">
                            <h4>CONTACTO</h4>
                            <h5>Correo:</h5>
                            <p>tuatuweb.com@gmail.com</p>
                            <!--<p>+231 123.45.67</p>
          <h5>Dirección:</h5>
          <p>Lorem ipsum dolor sit amet, consect etuer adipis cing elit.</p>
          <h5>Código postal:</h5>
          <p>1234</p>-->
                            <!--<p>caracas - venezuela</p>-->
                        </div>
                        <div class="col-md-3 col-12 fuenteblanco">
                            <h4>ENLACES</h4>
                            <p><img src="iconos/redes-01.png">Tuautoweb</p>
                            <p><img src="iconos/redes-02.png">@Tuautoweb</p>
                            <!--<p><img src="iconos/redes-03.png">+231 123.45.67</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="log-in" class="tab-pane fade-in">
            <div class="login">
                <figure class="tint tint-yellow-light">
                    <img class="w-100" src="fotos/fo1.jpg">
                </figure>
                <div class="centered-above px-5 login-form">
                    <div class="text-center">
                        <img class="navbar-logo login-logo mb-5" src="logo/logo_sm.png">
                    </div>
                    <div>
                        <h5 class="fuenteblanco">E-Mail</h5>
                        <input type="text" placeholder="" name="email">
                        <h5 class="fuenteblanco">Contraseña</h5>
                        <input type="text" placeholder="" name="pwd">
                    </div>
                    <div class="text-center w-100">
                        <div class="button-container mx-auto align-content-center">
                            <button class="w-100 px-4 mx-auto mb-2 mb-sm-5 fuenteblanco">INGRESAR</button>
                            <button class="w-100 px-4 mx-auto mt-2 gray fuenteblanco" onclick="ShowTab('sign-in')">REGISTRARSE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="help" class="tab-pane fade-in">
            <div class="help">
                <figure class="tint tint-yellow-light">
                    <img class="w-100" src="fotos/fo1.jpg">
                </figure>
                <div class="centered-above fuenteblanco">
                    <h3>¿COMÓ PODEMOS AYUDARTE?</h3>
                    <div class="faq-search" action="action_page.php">
                        <input type="text" placeholder="Buscar..." name="Email">
                        <button>Buscar</button>
                    </div>
                </div>
            </div>
            <div class="container my-5 p-4 text-center">
                <div class="row w-100">
                    <div class="col-12 col-sm-4 mb-4">
                        <img src="iconos/fgc_icons-010.png">
                    </div>
                    <div class="col-12 col-sm-4 mb-4">
                        <img src="iconos/fgc_icons-020.png">
                    </div>
                    <div class="col-12 col-sm-4 mb-4">
                        <img src="iconos/fgc_icons-030.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container pt-5 text-left">
            <div class="row">
                <div class="col-3 md-hide fuentebold">
                    <h5>NUESTRA COMPAÑIA</h5>
                    <ul class="list-unstyled">
                        <li onclick="ShowTab('us')" class="fuente">Nosotros</li>
                        <li onclick="ShowTab('contact')" class="fuente">Contactos</li>
                        <li class="fuente">Noticias</li>
                        <li onclick="ShowTab('help')" class="fuente">Preguntas frecuentes</li>
                    </ul>
                </div>
                <!-- <div class="col-5 md-hide">
      <h5>MANTENTE EN CONTACTO</h5>
      <ul class="list-unstyled">
        <li onclick="ShowTab('register')">Registrate para estar al tanto de las mejores ofertas y publicaciones del dia a dia</li>
      </ul>
    </div>-->
                <!-- <div class="col-12 col-md-4">
      <h5>BOLETIN INFORMATIVO</h5>
      <div class="register-mail" action="action_page.php">
        <input type="text" placeholder="Correo" name="Email">
        <button>Registrate</button>
      </div>
    </div>-->
            </div>
            <hr>
            <div class="row">
                <ul class="list-inline">
                    <li class="list-inline-item fuente">® 2019 TUAUTOWEB</li>
                    <li class="list-inline-item fuente">Sitio por TECNOFEP</li>
                </ul>
            </div>
        </div>
    </footer>


    <!--------------------------Modal para avisos-------------------------------->

    <div class="modal fade" id="aviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">ATENCIÓN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body avisos">
                    <div id="Contenedor">

                        <div id="bienvenida" style="display: none">
                            <p>BIENVENIDO A NUESTRO SISTEMA, A CONTINUACIÓN LLEGARÁ UN CORREO ELECTRÓNICO A LA CUENTA
                                CON LA QUE SE REGISTRO PARA LA VALIDACIÓN DE LA MISMA, RECUERDE VERIFICAR EN LOS CORREOS
                                NO DESEADOS O SPAM SI NO LO VE EN SU BANDEJA DE ENTRADA</p>

                            <p>PARA CUALQUIER INFORMACIÓN, INQUIETUD O SOPORTE COMUNIQUESE CON NOSOTROS</p>

                        </div>


                        <div id="recupera" style="display: none">

                            <p class="bienvenidos">SE LE HA ENVIADO A SU CORREO ELECTRÓNICO UNA NUEVA CLAVE, RECUERDE
                                REVISAR LA BANDEJA DE SPAM O CORREOS NO DESEADOS SI EL CORREO NO APARECE EN UNOS MINUTOS
                                EN SU BANDEJA DE ENTRADA. CUALQUIER INFORMACIÓN O PROBLEMA COMUNIQUESE CON NUESTRO
                                SOPORTE.</p>


                        </div>

                        <div id="validado" style="display: none">

                            <p class="bienvenidos">SU CUENTA HA SIDO VALIDADA EXITOSAMENTE, YA PUEDE INGRESAR CON SUS
                                DATOS DE USUARIO A NUESTRO SISTEMA</p>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="busqueda.js"></script>

</html>