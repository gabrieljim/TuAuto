<?php
$tipo = $_POST['tipo_usuario'];

if ($tipo === 'usuario') {
    $html = '<form>
        <input type="text">
    </form>';
    echo $html;
} else {
}
