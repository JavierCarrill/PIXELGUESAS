<?php

include 'DAO/config.php';
include 'DAO/carritoDAO.php';
include 'templates/encabezado.php';

?>

<br>
<h3>Lista del carrito</h3>

<?php if(!empty($_SESSION['CARRITO'])){ ?>


<table class="table table-bordered">
    <body>
        <tr>
            <th width="40%">Descripción</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>

        <tr>
            <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
            <th width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></th>
            <th width="20%" class="text-center"><?php echo $producto['PRECIO'] ?></th>
            <th width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2) ?></th>
            <td width="5%">
                
            <form action="" method="post">

            <input 
            type="hidden" 
            name="id" 
            id="id" 
            value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
            
            <button 
            class="btn btn-danger" 
            type="submit"
            name="btnAccion"
            value="Eliminar"
            >Eliminar</button>
        
            </form>



        </td>
        </tr>

        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
        <?php } ?>

        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2) ?></h3></td>
        </tr>
        
          


    </body>
</table>

<tr colspan="5">

<form action="pagar.php" method="post">
    <div class="alert alert-success">

    <div class="form-group">
            <label for="my-input">Correo de contacto:</label>
            <input 
            type="email" 
            id="email" 
            name="email"
            class="form-control"
            placeholder="Por favor escribe tú correo"
            required>
        </div>
        <small id="emailHelp"
            class="form-text text-muted">
        La factura se enviará a este correo.
        </small>
    </div> 
    <button class="btn btn-warning btn-lg btn-block" type="submit" value="proceder" name="btnAccion">
        Proceder a pagar>>
    </button>      
</form>
</tr> 

<?php }else{ ?>

    <div class="alert alert-success"></div>
    No hay productos en el carrito...

<?php } ?>
<?php 
    
    include 'templates/footer.php'; 

    ?>