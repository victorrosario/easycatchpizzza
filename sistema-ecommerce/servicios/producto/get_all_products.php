<?php

include('../_conexion.php');
$response = new stdClass();

//$datos=array();
$datos=[];
$i=0;
$sql= "select * from producto where estado=1";
$result = mysqli_query($con,$sql); // la variable $con viene de conexion.php
while($row=mysqli_fetch_array($result)){// recorre todos los resultados de esta consulta eb ka variable $row y los va iterando uno a uno 
    $obj=new stdClass(); // creamos un objeto new stdClass() del mismo tipo del $response
    $obj->codpro=$row['codpro'];
    $obj->nompro=$row['nompro'];
    $obj->despro=$row['despro'];
    $obj->prepro=$row['prepro'];
    $obj->rutimapro=$row['rutimapro'];
    $datos[$i]=$obj;
    $i++;
}
$response->datos=$datos; // INVESTIGAR

mysqli_close($con);
header('Content-Type: application/json'); // para que nos diga que  este resultado es de tipo json
echo json_encode($response); // y ademas que muestre esa respuesta en formato json


?>