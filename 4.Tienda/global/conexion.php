<?php
///CODIGO DE CONEXIÓN CON LA BASE DE DATOS 
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo= new PDO($servidor,USUARIO,PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
            );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<script>alert('Conectado...')</script>";
}catch(PDOException $e){
    //echo "<script>alert('Error...')</script>";
}
?>