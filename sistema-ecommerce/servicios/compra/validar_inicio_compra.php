<?php

session_start(); // con esto iniciamos la session , inicializa las variables de session
$response=new stdClass(); // objeto response

if(!isset($_SESSION['codusu'])){ // le estamos diciendo que si  no existe una variable con codigo de usuario con un valor 
    $response->state=false; // el atributo state que lo ponemos en false
    $response->detail="No esta loqueado"; // atributo detail  que lo ponemos el detalle del estado no esta loqueado
    $response->open_login=true;


}else{
    include_once("../_conexion_sistemaEcommer.php");
    $codusu=$_SESSION['codusu']; /*el codigo de usuario es decir el id lo obtenemos de la session activa*/ 
    $codpro=$_POST['codpro'];/* agarramos el codigo de producto que esta que es de tipo post que esta en producto.php como codpro:p en la funcion iniciar_compra*/
    $sql="INSERT INTO pedido(codusu,codpro,fecped,estado,dirusuped,telusuped)  VALUES ($codusu,$codpro,now(),1,'','') "; /*que cuando este leoqueado haga una logica de insercion de este producto , ponemos la funcion now() para que ponga la fecha actual en la que estemos y la hora y de estado del producto ponemos 1 para decir que esta activo  la direccion del usuario del pedido y el numero de telefono del usuario lo dejamos vacios on cmillas simples*/
    $result = mysqli_query($con,$sql); /*INVESTIGAR QUE ES mysqli_query*/
    if($result) /*si result es verdadero es decir que se inserto todo correctamente que mande el mensaje del estado de que el producto esta agregado*/{
        $response->state=true;
        $response->detail="Producto agregado";
        
    }else{/*caso contrario si a habido un error introduciendo los datos del pedido */
        $response->state=false;
        $response->detail="no se ha podido agregar el producto . intente mas tarde ";
    }
    mysqli_close($con); // $con es la variable conexion que pasamos por parametro Y LE ESTAMOS DICIENDO QUE CIERRE LA CONEXION CON LA BASE DE DATOS
}
header('Content-Type: application/json'); // para que nos diga que  este resultado es de tipo json
echo json_encode($response); // y ademas que muestre esa respuesta en formato json







?>