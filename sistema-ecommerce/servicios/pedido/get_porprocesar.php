
<?php
include('../_conexion_sistemaEcommer.php');
$response=new stdClass();

function estado2texto($id){
	switch ($id) {
		case '1':
			return 'Por procesar';
			break;
		case '2':
			return 'Por pagar';
			break;
		default:
			break;
	}
}

$datos=[];
$i=0;
/*esto  orden sql es para que una las tablas de producto con pedido*/
$sql="select *,ped.estado estadoped from pedido ped
inner join producto pro
on ped.codpro=pro.codpro
where ped.estado=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->codped=$row['codped'];
	$obj->codpro=$row['codpro'];
	$obj->nompro=utf8_encode($row['nompro']);
	$obj->prepro=$row['prepro'];
	$obj->rutimapro=$row['rutimapro'];
	$obj->fecped=$row['fecped'];
	$obj->dirusuped=utf8_encode($row['dirusuped']); /* con el uf8_encode ya no tendremos el problema de poenr ñ o cualuqier signo raro como comas*/
	$obj->telusuped=$row['telusuped'];
	$obj->estado=estado2texto($row['estadoped']); /*los estados se pasan a texto la  funcion estado2texto*/
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
