<?php
include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';
?>
        <div class="container">
            <?php if($mensaje!=""){?>
                <div class="mt-2 alert alert-success" role="alert">
                    <?php echo "$mensaje";?>
                    <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
                </div>
            <?php }?>
            <div class="row">
                <?php
                    $select=$pdo->prepare("SELECT * FROM tblproductos");
                    $select->execute();
                    $listaProductos=$select->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($listaProductos);
                ?>
                <?php foreach($listaProductos as $producto){ ?>
                    <div class="col-3">
                        <div class="card mt-3 mb-2">
                            <img 
                            title="<?php echo $producto['nombre'];?>" 
                            class="card-img-top"
                            src="<?php echo $producto['imagen'];?>" 
                            alt="<?php echo $producto['nombre'];?>"
                            data-toggle="popover"
                            data-trigger="hover"
                            data-content="<?php echo $producto['descripcion'];?>"
                            height="317px">
                            <div class="card-body bg-dark text-warning">
                                <span><?php echo $producto['nombre'];?></span>
                                <h5 class="card-title"><?php echo $producto['precio'];?>€</h5>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY);?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY);?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                                    <button class="btn btn-warning" type="submit" name="btnAction" value="agregar">Agregar al carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
            <script>
                $(function () {
                    $('[data-toggle="popover"]').popover()
                })
            </script>
        </div>
<?php
include 'templates/pie.php';
?>