<?php

if (!isset($_SESSION)) {
    session_start();
}

$vehiculo = $_GET['id'];

echo "
    <form enctype='multipart/form-data' role='form' action='eliminar.php' method='post'>
        <input type='hidden' name='vehiculo' value='$vehiculo'>
        <div class='col-md-3 col-md-offset-9 text-right'>
            <div class='btn-group contenedor-botones text-center' role='group'>
                <button class='btn btn-default boton-adaptado' type='submit'><span class='glyphicon glyphicon-step-bac'></span>Si</button>
                <button type='button' class='btn btn-default boton-adaptado' data-dismiss='modal'>
                        <span class='glyphicon glyphicon-step-bac'>No</span>
                    </button>
            </div>
        </div>
    </form>";

?>