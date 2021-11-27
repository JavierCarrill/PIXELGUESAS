<?php



include 'DAO/config.php';
include 'DAO/conexion.php';
include 'DAO/carritoDAO.php';
include 'templates/encabezado.php';



?>


    
    <br>
    <?php if($mensaje!=""){?>

        <div class=class="alert alert-success">
            <?php  echo $mensaje; ?>
            <a href="carrito.php" class="badge badge-success">Ver carrito</a>
        </div>

        <?php } ?>

        <br>

    <div class="row">

    <?php
    
        $sentencia=$pdo->prepare("SELECT * FROM productos"); #identificamos tabla productos
        $sentencia->execute(); #ejecutamos tabla
        $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);#traemos productos
        //print_r($lista);

    ?>
     <?php foreach($lista as $producto){?>

        <div class="col-3">
            <div class="card">
                <img 
                title="<?php echo $producto['descripcion'];?>"
                alt="<?php echo $producto['descripcion'];?>"
                class="card-img-top" 
                src="./img/<?php echo $producto['imagen'];?>"

                data-toggle="popover"
                data-trigger="hover"
                data-content="<?php echo $producto['detalle'];?>"
            
                >

                <div class="card-body">
                    <span><?php echo $producto['descripcion'];?></span>
                    <h5 class="card-title">col $ <?php echo $producto['precio'];?></h5>
                    

                    <form action="" method="post">

                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
                        <input type="hidden" name="descripcion" id="descripcion" value="<?php echo openssl_encrypt($producto['descripcion'],COD,KEY);?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY);?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">

                    <button class="btn btn-warning" 
                            name="btnAccion" 
                            value="Agregar"
                            type="submit"
                            >
                            Agregar
                            </button>
                        </form>                    
                </div>
            </div>
        </div>

    <?php } ?>
        
    </div>

        <script>
            $(function () {

                $('[data-toggle="popover"]').popover()

            });
        </script>

    <?php 
    
    include 'templates/footer.php'; 

    ?>