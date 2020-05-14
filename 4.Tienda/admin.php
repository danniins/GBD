
<?php
///INCLUIMOS LÁS DEMÁS PÁGINAS PARA EL CORRECTO FUNCIONAMIENTO
include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';
?>
<div class="container-fluid">
    <?php if($mensaje!=""){?>
        <div class="mt-2 alert alert-success" role="alert">
            <?php echo "$mensaje";?>
                <a href="mostrarTienda.php" class="badge badge-success">Ver tienda</a>
        </div>
    <?php }?>
</div>
<table class="table table-bordered">
        <tbody>
            <tr>
                <th width="30%" class="text-center">Imagen</th>
                <th width="15%" class="text-center">Nombre</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="25%" class="text-center">Descripción</th>
                <th width="5%">Eliminar</th>
                <th width="5%">Modificar</th>
            </tr>
            <?php $total=0; ?>
            <!-- LEE LA TABLA producto -->
            <?php
                   $select=$pdo->prepare("SELECT * FROM producto");
                   $select->execute();
                   $listaProductos=$select->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <!-- CREAMOS UN BUCLE PARA QUE CREE TANTAS CELDAS COMO PRODUCTOS HAYA EN NUESTRA TABLA CON LA OPCIÓN INPUT PARA MODIFICAR LOS DATOS-->

            <?php foreach($listaProductos as $producto){ ?>
            <tr>
                <form method="post" action="">
                    <td width="30%" class="text-center"><input type="text" name="imagen" value="<?php echo $producto['imagen'];?>"></td>
                    <td width="15%" class="text-center"><input type="text" name="nombre" value="<?php echo $producto['nombre']?>"></td>
                    <td width="20%" class="text-center"><input type="text" name="precio" value="<?php echo $producto['precio']?>"></td>
                    <td width="25%" class="text-center"><input type="text" name="descripcion" value="<?php echo $producto['descripcion']?>">
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'];?>"></td>
                    <td width="5%">   
                    <button class="btn btn-danger" type="submit" name="btnAction" value="sacar_producto">Eliminar</button>        
                    </td>
                    <td width="5%">
                        <button type="submit" class="btn btn-info text-dark" name="btnAction" value="modificar">Modificar</button>
                    </td>
                </form>
            </tr>
            <?php }?> 
            <tr>
            <!-- Creamos un botón Modal para insertar datos en la BD -->
                <td colspan="5">
                    <button type="button" class="btn btn-success btn-lg btn-block text-dark" data-toggle="modal" data-target="#insert">Insertar Producto</button>
                    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title" id="">Inserta nuevo producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-dark text-light">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="login">Imágen</label>
                                            <input type="text" name="imagen" id="insert" placeholder="Introduce la url de la imágen"  class="form-control" required="yes">
                                        </div>
                                        <div class="form-group">
                                            <label for="login">Nombre</label>
                                            <input type="text" name="nombre" id="insert" placeholder="Introduce el nombre del producto" class="form-control" required="yes">
                                        </div>
                                        <div class="form-group">
                                            <label for="login">Precio</label>
                                            <input type="text" name="precio" id="insert" placeholder="Introduce el precio del producto" class="form-control" required="yes">
                                        </div>
                                        <div class="form-group">
                                            <label for="login">Descripción</label>
                                            <input type="text" name="descripcion" id="insert" placeholder="Introduce la descripción del producto" class="form-control" required="yes">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" value="insert" name="btnAction" class="btn btn-warning text-dark">Crear producto</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>


<?php
include 'templates/pie.php';
?>