<?php
///CÓDIGO USADO PARA HACER LLEGAR PARÁMETROS A NUESTRO CARRITO
if(!isset($_SESSION)){
    session_start();
   }
    $mensaje="";
    if(isset($_POST['btnAction'])){
        ///HAY CREADO UN BOTÓN LLAMADO btnAction VARIAS VECES CON DIFERENTES values Y DETERMINAMOS QUE DEBE HACER CON CADA value
        switch ($_POST['btnAction']){
            case 'agregar':///AGREFA PRODUCTOS AL CARRITO PASANDO UNO POR UNO CADA COMPONENTE DEL PRODUCTO ALOJADO EN LA BASE DE DATOS (id,nombre,...etc)
                ///DESDE LA TIENDA ENVÍAN PRODUCTOS ENCRIPTADOS Y AQUÍ LOS DESENCRIPTAMOS Y LOS METEMOS EN UNA VARIABLE
                if(is_numeric(openssl_decrypt($_POST['id_producto'],COD,KEY))) {
                    $ID=openssl_decrypt($_POST['id_producto'],COD,KEY);
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
                        'ID_PRODUCTO'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['carrito'][0]=$producto;
                    $mensaje= "Producto agreagdo al carrito";
                }else{
                    $idProductos=array_column($_SESSION['carrito'],"ID_PRODUCTO");
                    if (in_array($ID,$idProductos)){
                        echo "<script>alert('El producto ya ha sido seleccionado...');</script>";
                        $mensaje="";
                    }else{
                        $numeroProductos=count($_SESSION['carrito']);
                        $producto=array(
                            'ID_PRODUCTO'=>$ID,
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
                if(is_numeric(openssl_decrypt($_POST['id_producto'],COD,KEY))) {
                    $ID=openssl_decrypt($_POST['id_producto'],COD,KEY);
                    foreach ($_SESSION['carrito'] as $indice => $producto) {
                        if($producto['ID_PRODUCTO']==$ID){
                            unset($_SESSION['carrito'][$indice]);
                            echo "<script>alert('Elemento borrado...')</script>";

                        }
                    }
                }else{$mensaje.="Upps... ID incorrecto"."<br>";}
            break;
            case "sacar_producto":
                try {
                    $id_producto=$_POST['id_producto'];
                    $eliminar=$pdo->prepare("DELETE FROM producto WHERE id_producto=:id_producto");
                    $eliminar->bindParam('id_producto',$id_producto);
                    $eliminar->execute();
                } catch (Exception $th) {
                    echo $th->getMessage();
                    echo 'esto es una mrd';
                }   
            break;
            case 'modificar':
                $id_producto=$_POST['id_producto'];
                $nombre = $_POST["nombre"];
				$imagen = $_POST["imagen"];
                $precio = $_POST["precio"];
                $descripcion = $_POST["descripcion"];
			    $update1 = "UPDATE producto SET nombre=:nombre WHERE id_producto=:id_producto";
   				$result1 = $pdo->prepare($update1);
                $result1->bindValue(':nombre', $nombre);
                $result1->bindValue(':id_producto', $id_producto);   
                $result1->execute();
                $update2 = "UPDATE producto SET precio=:precio WHERE id_producto=:id_producto";
   				$result2 = $pdo->prepare($update2);
                $result2->bindValue(':precio', $precio);
                $result2->bindValue(':id_producto', $id_producto);  
                $result2->execute();
                $update3 = "UPDATE producto SET descripcion=:descripcion WHERE id_producto=:id_producto";
   				$result3 = $pdo->prepare($update3);
                $result3->bindValue(':descripcion', $descripcion);
                $result3->bindValue(':id_producto', $id_producto);  
                $result3->execute();
                $update4 = "UPDATE producto SET imagen=:imagen WHERE id_producto=:id_producto";
                $result4 = $pdo->prepare($update4);
                $result4->bindValue(':imagen', $imagen);
                $result4->bindValue(':id_producto', $id_producto);  
                $result4->execute();
                $mensaje= "Producto modificado correctamente";
                
                
            break;
            case 'insert':
                $nombre = $_POST["nombre"];
                $precio = $_POST["precio"];
                $descripcion = $_POST["descripcion"];
                $imagen = $_POST["imagen"];
                $insert = $pdo->prepare("INSERT INTO producto VALUES (NULL, :nombre, :precio, :descripcion, :imagen)");
                $insert->bindParam(':nombre', $nombre);
                $insert->bindParam(':precio', $precio);
                $insert->bindParam(':descripcion', $descripcion);	
                $insert->bindParam(':imagen', $imagen);	
                $insert->execute();
                
            break;
        }
    }
?>