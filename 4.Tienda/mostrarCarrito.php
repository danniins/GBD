<?php
include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';
?>
<div class="container">
    <br>
    <h3>Lista del carrito</h3>
    <hr>
    <?php
        if(!empty($_SESSION['carrito'])){
    ?>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th width="40%">Descripción</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Total</th>
                <th width="5%">--</th>
            </tr>
            <?php $total=0; ?>
            <?php foreach ($_SESSION['carrito'] as $indice =>$producto){?>
            <tr>
                <td width="40%"><?php echo $producto['NOMBRE']?></td>
                <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
                <td width="20%" class="text-center">€<?php echo $producto['PRECIO']?></td>
                <td width="20%" class="text-center">€<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2); ?></td>
                <td width="5%">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                        <button class="btn btn-danger" type="submit" name="btnAction" value="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
            <?php }?>
            <tr>
                <td colspan="3" align="right"><h3>Total</h3></td>
                <td align="right"><h3><?php echo number_format($total,2);?>€</h3></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    <form method="post" action="pagar.php">
                        <div class="alert alert-success" role="alert">
                            <div class="form-group">
                                <label for="my-input">Correo de contacto:</label>
                                <input id="email" name="email" 
                                class="form-control" 
                                type="email"
                                placeholder="Por favor escriba su correo" 
                                required name="">
                            </div>
                            <small id="emailHelp"
                            class="form-text text-muted"
                            >Los productos se enviarán a este correo</small>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAction" value="proceder">Proceder a pagar >></button>
                    </form>
                </td>
            </tr>


        </tbody>
        </table>
        <?php }else{?>
        <div class="alert alert-success" role="alert">
            No hay contenido en el carrito
        </div>
        <?php }?>
</div>
    <?php
include 'templates/pie.php';
?>