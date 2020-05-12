<?php
include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';
?>


<?php
    if ($_POST){
        $total=0;
        foreach ($_SESSION['carrito'] as $indice => $producto) {
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
            echo '<h3>'.$total.'</h3>';

        }
    }
?>

<?php
	include 'templates/pie.php';
?>