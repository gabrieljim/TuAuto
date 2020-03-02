<?php
$tipo = $_POST['tipo_usuario'];

if ($tipo === 'usuario') {
    $form = '
<form id="update-user-form" method="POST" action="usuario/updateDataUser.php">
<div class="container d-flex justify-content-center" id="form-container">
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="name">Nombre</label>
            <input required type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group col-sm-6">
            <label for="lastname">Apellido</label>
            <input required type="text" class="form-control" name="lastname" id="lastname">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="document">Documento</label>
            <input required type="text" class="form-control" name="document" id="document">
        </div>
        <div class="form-group col-sm-6">
            <label for="cellphone">Celular</label>
            <input required type="text" class="form-control" name="cellphone" id="cellphone">
        </div>
    </div>  
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="address">Dirección</label>
            <input required type="text" class="form-control" name="address" id="address">
        </div>
    </div>  
    <input type="submit" class="btn btn-primary" value="Enviar">
</div>
</form>
    ';
} else {
    $form = '
    <form id="update-user-form" method="POST" action="usuario/updateDataBusiness.php">
    <div class="container d-flex justify-content-center" id="form-container">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="name">Nombre</label>
                <input required type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col-sm-6">
                <label for="rut">RUT</label>
                <input required type="text" class="form-control" name="rut" id="rut">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="nombrefantasia">Nombre Fantasía</label>
                <input required type="text" class="form-control" name="nombrefantasia" id="nombrefantasia">
            </div>
        </div>  
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="local">Teléfono Local</label>
                <input required type="text" class="form-control" name="local" id="local">
            </div>
            <div class="form-group col-sm-4">
                <label for="telefono1">Celular 1</label>
                <input required type="text" class="form-control" name="telefono1" id="telefono1">
            </div>
            <div class="form-group col-sm-4">
                <label for="telefono2">Celular 2</label>
                <input required type="text" class="form-control" name="telefono2" id="telefono2">
            </div>
        </div>  
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="address">Dirección</label>
                <input required type="text" class="form-control" name="address" id="address">
            </div>
        </div>  
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
    </form>
        ';
}
echo $form;
