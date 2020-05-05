<?php
    session_start();
    $mensaje="";
    if(isset($_POST['btnAction'])){

        switch ($_POST['btnAction']){
            case 'agregar':
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    $mensaje.="Ok ID correcto".$ID."<br>";
                }else{$mensaje.="Upps... ID incorrecto"."<br>";break;}

                if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
                    $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                    $mensaje.="Ok Nombre correcto".$NOMBRE."<br>";
                }else{$mensaje.="Upps... algo pasa con el nombre"."<br>"; break;}
    
                if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))) {
                    $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                    $mensaje.="Ok Cantidad correcta".$CANTIDAD."<br>";
                }else{$mensaje.="Upps... algo pasa con la cantidad"."<br>";break;}

                if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) {
                    $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.="Ok Precio correcto".$PRECIO."<br>";
                }else{$mensaje.="Upps... algo pasa con el precio"."<br>";break;}

                
                if (!isset($_SESSION['carrito'])) {
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['carrito'][0]=$producto;
                    $mensaje= "Producto agreagdo al carrito";
                }else{
                    $idProductos=array_column($_SESSION['carrito'],"ID");
                    if (in_array($ID,$idProductos)){
                        echo "<script>alert('El producto ya ha sido seleccionado.... Si quieres modificar la cantidad visita tu carrito.');</script>";
                        $mensaje="";
                    }else{
                        $numeroProductos=count($_SESSION['carrito']);
                        $producto=array(
                            'ID'=>$ID,
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
            case "eliminar":
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))) {
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    foreach ($_SESSION['carrito'] as $indice => $producto) {
                        if($producto['ID']==$ID){
                            unset($_SESSION['carrito'][$indice]);
                            echo "<script>alert('Elemento borrado...')</script>";

                        }
                    }
                }else{$mensaje.="Upps... ID incorrecto"."<br>";}
            break;
        }
    }

?>