<?php

include('../_conexion_sistemaEcommer.php');/*aqui ta estamos incluyend o la variable $con */
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
$sql="select * from producto where estado=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->codpro=$row['codpro'];
	$obj->nompro=utf8_encode($row['nompro']);
	$obj->despro=utf8_encode($row['despro']); /*el uf8_encode hace que `podamos poner la ñ y demas simbolos raros sim problemas*/
	$obj->prepro=$row['prepro'];
	$obj->rutimapro=$row['rutimapro'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con); /*cerramos la  coneion es decir cerramos la consulta*/
header('Content-Type: application/json');
echo json_encode($response);

?>