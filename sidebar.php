<?php $textColor = 'black'; ?>
<div class="navbar"><img src="<?php echo $row_user['foto'] ?>" style="display: block; width:100px; height: 100px; border-color:black; border-radius: 100%; margin-top: 35px;margin-right: auto; margin-left: auto;">
    <header class="section-header" style="padding-top: 5px;">
        <h2 class="text-center" style="color: <?= $textColor ?>;font-size: 18px;"><?= $row_user['tipo_cliente'] ? $row_user['nombre_fantasia'] : $row_user['nombre'] ?></h2>
        <p class="text-center" style="color: <?= $textColor ?>  ;"><?php echo $row_user['tipo_cliente'] ? 'Empresa' : 'Usuario' ?></p>
    </header>
</div>
<?php
switch ($selected) {
    case 'escritorio':
        $escritorio = 'active-menu';
        $usuario = '';
        $publicar = '';
        break;
    case 'usuario':
        $usuario = 'active-menu';
        $escritorio = '';
        $publicar = '';
        break;
    case 'publicar':
        $publicar = 'active-menu';
        $usuario = '';
        $escritorio = '';
        break;
}
?>
<?php if ($row_user['tipo_cliente'] == 0) : ?>
    <li>
        <a href="escritorio.php" class=<?= $escritorio ?>><i class="fa fa-dashboard"></i>Escritorio</a>
    </li>
    <li>
        <a href="usuario.php" class=<?= $usuario ?>><i class="fa fa-user" style="font-size: 30px;"></i>Usuario</a>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-envelope-o"></i>Mensajes
        </a>
    </li>
    <li>
        <a href="publicar.php" class=<?= $publicar ?>><i class="fa fa-bar-chart-o"></i>Publicar</a>
    </li>
    <li><a href="usuario/close.php"><i class="fa fa-sign-out"></i>Cerrar Sesión</a>
    </li>
<?php else : ?>
    <li>
        <a href="escritorio.php" class=<?= $escritorio ?>><i class="fa fa-dashboard"></i>Escritorio</a>
    </li>
    <li>
        <a href="usuario.php" class=<?= $usuario ?>><i class="fa fa-user" style="font-size: 30px;"></i>Usuario</a>
    </li>
    <li>
        <a href="publicar.php" class=<?= $publicar ?>><i class="fa fa-bar-chart-o"></i>Publicar</a>
    </li>
    <li id="contact">
        <a><i class="fa fa-phone"></i>Contacto</a>
        <div id="contact-info">
            <div>
                <p>Local:</p>
                <p>Telefono 1:</p>
                <p>Telefono 2:</p>
            </div>
            <div style='padding-left:20px'>
                <p><?= $row_user['local'] ?></p>
                <p><?= $row_user['telefono1'] ?></p>
                <p><?= $row_user['telefono2'] ?></p>
            </div>
        </div>
    </li>
    <li>
        <a href="#"><i class="fa fa-gear"></i>Servicios</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-map-marker"></i> Ubicación</a>
    </li>
    <li> <a href="usuario/close.php"><i class="fa fa-sign-out"></i>Cerrar Sesión</a>
    </li>
<?php endif ?>

<script src="assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="sidebar.js"></script>