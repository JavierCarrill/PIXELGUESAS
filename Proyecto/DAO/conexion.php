<?php

$servidor="mysql:dbname=".BD.";host=".SERVIDOR; #cadena de conexión

try{

    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));#conexión a la base de datos

    //echo "<script>alert('Conectado...')</script>";#alerta positiva

}catch(PDOException $e){

    //echo "<script>alert('Error...')</script>";#alerta negativa

}

?>