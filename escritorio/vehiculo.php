<?php

if (!isset($_SESSION)) {
    session_start();
}

include("../consultas/conex.php");
require("../consultas/marca.php");
require("../consultas/combustible.php");
require("../consultas/puertas.php");
require("../consultas/dirvolante.php");
require("../consultas/ano.php");
require("../consultas/tipo.php");
require("../consultas/estados.php");
require("../consultas/color.php");
require("../consultas/trans.php");
require("../consultas/condicion.php");

//ID del vehiculo que se va a editar
$vehiculo = $_GET['id'];

//consulta todos los empleados
$usuario = $_SESSION['usuario'];

//mostrar los datos que tiene el vehiculo que se va a editar
$query = "SELECT DISTINCT combustible.combustible, combustible.cod_combustible, color.color, color.cod_color, estados.cod_estado, estados.estado, puertas.puertas, puertas.cod_puertas, ano.ano, ano.cod_ano, marca.cod_marca, marca.marca, dirvolante.cod_dire, dirvolante.dirvolante, modelo.cod_modelo, modelo.modelo, tipo_vehiculo.cod_tipov, tipo_vehiculo.tipov, tipo.cod_tipo, tipo.tipo, transmision.cod_transmision, transmision.transmision, vehiculo.imagen1, vehiculo.imagen2, vehiculo.imagen3, vehiculo.imagen4, vehiculo.imagen5, vehiculo.precio, vehiculo.km, vehiculo.cod_vehiculo, vehiculo.descripcion FROM ano,marca,modelo,tipo,vehiculo,usuario,combustible,color,dirvolante,estados,pais,puertas,tipo_vehiculo,transmision WHERE vehiculo.cod_ano=ano.cod_ano AND vehiculo.cod_marca=marca.cod_marca AND vehiculo.cod_modelo=modelo.cod_modelo AND vehiculo.cod_estado=estados.cod_estado AND vehiculo.cod_tipo=tipo.cod_tipo AND vehiculo.cod_combustible=combustible.cod_combustible AND vehiculo.cod_puertas=puertas.cod_puertas AND vehiculo.cod_dir=dirvolante.cod_dire AND vehiculo.cod_color=color.cod_color AND vehiculo.cod_transmision=transmision.cod_transmision AND vehiculo.cod_tipov=tipo_vehiculo.cod_tipov AND vehiculo.cod_vehiculo=$vehiculo";
$publi = mysqli_query($conex, $query) or die (mysqli_error($conex));
//var_dump(mysqli_fetch_array($publi));


while ($row = mysqli_fetch_array($publi)) {

    //los datos que tiene guardado el auto seleccionado
    $km = $row['km'];
    $precio = $row['precio'];
    $descripcion = $row['descripcion'];
    $imagen1 = $row['imagen1'];
    $imagen2 = $row['imagen2'];
    $imagen3 = $row['imagen3'];
    $imagen4 = $row['imagen4'];
    $imagen5 = $row['imagen5'];

    $marca = $row['marca'];
    $codMarca = $row['cod_marca'];

    $modelo = $row['modelo'];
    $codModelo = $row['cod_modelo'];

    $codCombust = $row['cod_combustible'];
    $combust = $row['combustible'];

    $codPuerta = $row['cod_puertas'];
    $puerta = $row['puertas'];

    $codDirec = $row['cod_dire'];
    $direc = $row['dirvolante'];

    $codAno = $row['cod_ano'];
    $ano = $row['ano'];

    $codCondicion = $row['cod_tipo'];
    $condicion = $row['tipo'];

    $codEstado = $row['cod_estado'];
    $estado = $row['estado'];

    $codColor = $row['cod_color'];
    $color = $row['color'];

    $codTrans = $row['cod_transmision'];
    $trans = $row['transmision'];

    $codTipoVehi = $row['cod_tipov'];
    $tipov = $row['tipov'];

    //imprimir la modal
    echo "
    <form enctype='multipart/form-data' role='form' action='editar.php' method='post'>
        <div class='row'>
            <div class='col-lg-6'>
                <div class='form-group' style='font-size: 18px;'>
                    <label>Marca</label>
                    <select name='marca' class='form-control' onChange='modelos(this.value)'>
                        <option selected value='$codMarca'>$marca</option>
                        $opMarcas
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Modelo</label>
                    <select class='form-control' name='modelo' id='mod'>
                        <option selected value='$codModelo'>$modelo</option>
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Combustible</label>
                    <select name='combust' class='form-control'>
                        <option selected value='$codCombust'>$combust</option>
                        $opCombust
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Puertas</label>
                    <select name='puertas' class='form-control'>
                        <option selected value='$codPuerta'>$puerta</option>
                        $opPuertas
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Tipo de dirección</label>
                    <select name='tipodirec' class='form-control'>
                        <option selected value='$codDirec'>$direc</option>
                        $opDireccion
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Año</label>
                    <select name='ano' class='form-control'>
                        <option selected value='$codAno'>$ano</option>
                        $opAnos
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Tipo de Vehiculo</label>
                    <select name='tipovehi' class='form-control'>
                        <option selected value='$codTipoVehi'>$tipov</option>
                        $opTipoVehi
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Estado</label>
                    <select name='estado' class='form-control'>
                        <option selected value='$codEstado'>$estado</option>
                        $opEstados
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Color</label>
                    <select name='color' class='form-control'>
                        <option selected value='$codColor'>$color</option>
                        $opColores
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Transmisión</label>
                    <select name='transm' class='form-control'>
                        <option selected value='$codTrans'>$trans</option>
                        $opTransm
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Condición</label>
                    <select name='condic' class='form-control'>
                        <option selected value='$codCondicion'>$condicion</option>
                        $opCodicion
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Descripcion</label>
                    <input name='descrip' class='form-control' style='height: 80px;' type='text' id='descrip' value='$descripcion'>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>KM</label>
                    <input name='km' class='form-control' style='' type='text' value='$km'>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Precio</label>
                    <input name='precio' class='form-control' style='' type='text' value='$precio'>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Financiamiento</label>
                    <select name='finan' class='form-control'>
                        <option value='1'>SI</option>
                        <option value='2'>NO</option>
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Publicación Activa</label>
                    <select name='activo' class='form-control'>
                        <option value='1'>SI</option>
                        <option value='2'>NO</option>
                    </select>
                </div>

                <div class='form-group' style='font-size: 18px;'>
                    <label>Negociable</label>
                    <select name='negociable' class='form-control'>
                        <option value='1'>SI</option>
                        <option value='2'>NO</option>
                    </select>
                </div>
                <input type='hidden' name='vehiculo' value='$vehiculo'>
                <input type='hidden' name='imagen1' value='$imagen1'>
                <input type='hidden' name='imagen2' value='$imagen2'>
                <input type='hidden' name='imagen3' value='$imagen3'>
                <input type='hidden' name='imagen4' value='$imagen4'>
                <input type='hidden' name='imagen5' value='$imagen5'>
            </div>
            <div class='col-lg-6' style='margin-top: 0px; padding-top: 80px;'>

                <header class='section-header' style='padding-top: 10px;'>
                    <h2 class='text-center'>Subir Fotos</h2>
                    <br>
                </header>

                <img class='card-img-top' style='cursor:pointer; height: 250px; width: 350px' src='$imagen1'>
                <br>
                <br>
                <input multiple name='userfile[]' type='file'>
                <br>

                <button type='submit' class='btn btn-primary btn-lg btn-block'
                style='color: #000; background-color: #feee2c; height: 70px;  display: block; border: none;'>Actualizar
                Publicación</button>

                <button type='button' data-dismiss='modal' class='btn btn-primary btn-lg btn-block'
                style='color: #fff; background-color: #000; margin-top: 20px; height: 70px;  display: block; border: none;'>Cancelar
                Cambios</button>
                <br>
            </div>
        </div>
    </form>
";

}

mysqli_close($conex);
?>