<?php 

session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="Ok ID ".$ID."<br/>";
            }else{
                $mensaje.="Upss...ID incorrecto".$ID."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['descripcion'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['descripcion'],COD,KEY);
                $mensaje.="Ok nombre correcto".$NOMBRE."<br/>";
            }else{
                $mensaje.="Upss...nombre incorrecto"."<br/>"; break;
            }
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Ok precio correcto".$PRECIO. "<br/>";
            }else{
                $mensaje.="Upss...precio incorrecto"."<br/>"; break;
            }
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="Ok cantidad correcta".$CANTIDAD."<br/>";
            }else{
                $mensaje.="Upss...cantidad incorrecta"."<br/>"; break;
            }

            if(!isset($_SESSION['CARRITO'])){

                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }else{

                


                $numProductos=count($_SESSION['CARRITO']);

                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD
                );
                $_SESSION['CARRITO'][$numProductos]=$producto;
                $mensaje="Producto agregado al carrito";
            }
            //$mensaje=print_r($_SESSION,true);

            
            
        break;
        

        case "Eliminar":
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                
                foreach($_SESSION['CARRITO'] as $indice=>$producto){

                    if($producto['ID']==$ID){

                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('Elemento borrado...');</script>";

                    }

                }


            }else{
                $mensaje.="Upss...ID incorrecto".$ID."<br/>";
            }
        break;
            

    

    }
}



?>