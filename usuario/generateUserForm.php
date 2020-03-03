<?php
$tipo = $_POST['tipo_usuario'];

session_start();
$usuario = $_SESSION['usuario'];

include("../consultas/conex.php");
include("funciones.php");

$sql_usuario = "SELECT * FROM usuario, tipo_usuario, estados WHERE estados.cod_estado=usuario.cod_estado AND tipo_usuario.cod=usuario.tipo_usuario AND usuario.correo='$usuario'";
$resultado = mysqli_query($conex, $sql_usuario);

$row_user = mysqli_fetch_array($resultado);

mysqli_close($conex);

$correo = isset($row_user['correo']) ? $row_user['correo'] : '';
$razon = isset($row_user['razon']) ? $row_user['razon'] : '';
$nombre = isset($row_user['nombre']) ? $row_user['nombre'] : '';
$cedula = isset($row_user['cedula']) ? $row_user['cedula'] : '';
$apellido = isset($row_user['apellido']) ? $row_user['apellido'] : '';
$direccion = isset($row_user['direccion']) ? $row_user['direccion'] : '';
$local = isset($row_user['local']) ? $row_user['local'] : '';
$telefono1 = isset($row_user['telefono1']) ? $row_user['telefono1'] : '';
$telefono2 = isset($row_user['telefono2']) ? $row_user['telefono2'] : '';
$rif = isset($row_user['rif']) ? $row_user['rif'] : '';
$nombre_fantasia = isset($row_user['nombre_fantasia']) ? $row_user['nombre_fantasia'] : '';
$rut = isset($row_user['rut']) ? $row_user['rut'] : '';


if ($tipo === 'usuario') {
    $form = "
    <form id='update-user-form' method='POST' action='usuario/updateDataUser.php'>
        <div class='container d-flex justify-content-center' id='form-container'>
            <div class='row'>
                <div class='form-group col-sm-6'>
                    <label for='name'>Nombre</label>
                    <input value='$nombre' required type='text' class='form-control' name='name' id='name'>
                </div>
                <div class='form-group col-sm-6'>
                    <label for='lastname'>Apellido</label>
                    <input value='$apellido' required type='text' class='form-control' name='lastname' id='lastname'>
              </div>
            </div>
            <div class='row'>
                <div class='form-group col-sm-6'>
                  <label for='document'>Documento</label>
                  <input value='$cedula' required type='text' class='form-control' name='document' id='document'>
                </div>
            <div class='form-group col-sm-6'>
                <label for='cellphone'>Celular</label>
                <input value='$telefono1' required type='text' class='form-control' name='cellphone' id='cellphone'>
            </div>
        </div>
        <div class='row'>
            <div class='form-group col-sm-12'>
                <label for='address'>Dirección</label>
                <input value='$direccion' required type='text' class='form-control' name='address' id='address'>
            </div>
        </div>
        <input type='submit' class='btn btn-primary' value='Enviar'>
        </div>
    </form>
";
} else {
    $form = "
    <form id='update-user-form' method='POST' action='usuario/updateDataBusiness.php'>
        <div class='container d-flex justify-content-center' id='form-container'>
            <div class='row'>
                <div class='form-group col-sm-6'>
                    <label for='name'>Nombre</label>
                    <input value='$nombre' required type='text' class='form-control' name='name' id='name'>
                </div>
                <div class='form-group col-sm-6'>
                    <label for='rut'>RUT</label>
                    <input value='$rut' required type='text' class='form-control' name='rut' id='rut'>
                </div>
            </div>
            <div class='row'>
                <div class='form-group col-sm-12'>
                    <label for='nombrefantasia'>Nombre Fantasía</label>
                    <input value='$nombre_fantasia' required type='text' class='form-control' name='nombrefantasia' id='nombrefantasia'>
                </div>
            </div>
            <div class='row'>
                <div class='form-group col-sm-4'>
                    <label for='local'>Teléfono Local</label>
                    <input value='$local' required type='text' class='form-control' name='local' id='local'>
                </div>
                <div class='form-group col-sm-4'>
                    <label for='telefono1'>Celular 1</label>
                    <input value='$telefono1' required type='text' class='form-control' name='telefono1' id='telefono1'>
                </div>
                <div class='form-group col-sm-4'>
                    <label for='telefono2'>Celular 2</label>
                    <input value='$telefono2' required type='text' class='form-control' name='telefono2' id='telefono2'>
                </div>
            </div>
            <div class='row'>
                <div class='form-group col-sm-12'>
                    <label for='address'>Dirección</label>
                    <input value='$direccion' required type='text' class='form-control' name='address' id='address'>
                </div>
            </div>
            <input type='submit' class='btn btn-primary' value='Enviar'>
        </div>
    </form>
    ";
}

echo $form;
