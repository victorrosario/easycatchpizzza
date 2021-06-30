<?php

session_start(); // con esto iniciamos la session , inicializa las variables de session
$response=new stdClass(); // objeto response

if(!isset($_SESSION['codusu'])){ // le estamos diciendo que si  no existe una variable con codigo de usuario con un valor 
    $response->state=false; // el atributo state que lo ponemos en false
    $response->detail="No esta loqueado"; // atributo detail  que lo ponemos el detalle del estado no esta loqueado
    $response->open_login=true;


}else{
    $response->state=true;
    $response->detail="Esta logeado";
}
//mysqli_close($con); // $con es la variable conexion que pasamos por parametro
header('Content-Type: application/json'); // para que nos diga que  este resultado es de tipo json
echo json_encode($response); // y ademas que muestre esa respuesta en formato json







?>