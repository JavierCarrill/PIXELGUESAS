<?php

include 'DAO/config.php';
include 'DAO/conexion.php';
include 'DAO/carritoDAO.php';
include 'templates/encabezado.php';

?>

<br>
<?php 

if($_POST){

    $total=0;
    

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

    }

   

    echo "<h3>".$total."</h3>";

}

?>


<?php 
    
    include 'templates/footer.php'; 

    ?>