<?php
///CÓDIGO USADO PARA HACER LLEGAR PARÁMETROS A NUESTRO CARRITO
    session_start();
    $mensaje="";
    if(isset($_POST['btnAction'])){
        ///HAY CREADO UN BOTÓN LLAMADO btnAction VARIAS VECES CON DIFERENTES values Y DETERMINAMOS QUE DEBE HACER CON CADA value
        switch ($_POST['btnAction']){
            case 'agregar':///AGREFA PRODUCTOS AL CARRITO PASANDO UNO POR UNO CADA COMPONENTE DEL PRODUCTO ALOJADO EN LA BASE DE DATOS (id,nombre,...etc)
                ///DESDE LA TIENDA ENVÍAN PRODUCTOS ENCRIPTADOS Y AQUÍ LOS DESENCRIPTAMOS Y LOS METEMOS EN UNA VARIABLE
                if(is_numeric(openssl_decrypt($_POST['id-producto'],COD,KEY))) {
                    $ID=openssl_decrypt($_POST['id-producto'],COD,KEY);
                    $mensaje.="Ok ID correcto".$ID."<br>";
                }else{$mensaje.="Upps... ID incorrecto"."<br>";break;}

                if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
                    $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                    $mensaje.="Ok Nombre correcto".$NOMBRE."<br>";
                }else{$mensaje.="Upps... algo pasa con el nombre"."<br>"; break;}
    
                if(is_numeric($_POST['cantidad'])) {
                    $CANTIDAD=$_POST['cantidad'];
                    $mensaje.="Ok Cantidad correcta".$CANTIDAD."<br>";
                }else{$mensaje.="Upps... algo pasa con la cantidad"."<br>";break;}

                if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) {
                    $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.="Ok Precio correcto".$PRECIO."<br>";
                }else{$mensaje.="Upps... algo pasa con el precio"."<br>";break;}

                ///AQUÍ DETERMINAMOS QUE HACER CUANDO ELEGIMOS UN PRODUCTO EN LA TIENDA (ej: si no existe en el carrito se agrega y si existe no lo agrega y lanza un mensaje)
                if (!isset($_SESSION['carrito'])) {
                    $producto=array(
                        'ID-PRODUCTO'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['carrito'][0]=$producto;
                    $mensaje= "Producto agreagdo al carrito";
                }else{
                    $idProductos=array_column($_SESSION['carrito'],"ID-PRODUCTO");
                    if (in_array($ID,$idProductos)){
                        echo "<script>alert('El producto ya ha sido seleccionado...');</script>";
                        $mensaje="";
                    }else{
                        $numeroProductos=count($_SESSION['carrito']);
                        $producto=array(
                            'ID-PRODUCTO'=>$ID,
                            'NOMBRE'=>$NOMBRE,
                            'CANTIDAD'=>$CANTIDAD,
                            'PRECIO'=>$PRECIO
                        );
                        $_SESSION['carrito'][$numeroProductos]=$producto;
                        $mensaje= "Producto agreagdo al carrito";
                    }
                }
                //$mensaje=print_r($_SESSION,true);
                
            break;
            ///EL btnAction CON value eliminar EJECUTA ESTE CODIGO QUE MEDIANTE EL ID DEL PRODUCTO, BORRA ESTE DEL CARRITO
            case "eliminar":
                if(is_numeric(openssl_decrypt($_POST['id-producto'],COD,KEY))) {
                    $ID=openssl_decrypt($_POST['id-producto'],COD,KEY);
                    foreach ($_SESSION['carrito'] as $indice => $producto) {
                        if($producto['ID-PRODUCTO']==$ID){
                            unset($_SESSION['carrito'][$indice]);
                            echo "<script>alert('Elemento borrado...')</script>";

                        }
                    }
                }else{$mensaje.="Upps... ID incorrecto"."<br>";}
            break;
        }
    }

?>