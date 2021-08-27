<!DOCTYPE html>
<html>
<head>
	<title>Login EasyCatchPizza</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilologin.css">
	<link rel="stylesheet" href="../css/estilos.css">
	
</head>
<body>

	<?php
		include_once("../plantillas/navbar.inc.php");
		
	?>
	<div class="login-box">
		<img class="avatar" src="./assets/products//Logo-coco4.2.1.png" alt="">
		<h1>Login</h1>
		<form action="servicios/loginlogica.php" method="post"> <!--esto hara que cuando presione el botton  haga la logica que esta en loginlogica.php que es donde esta escrita la logica-->
			<!--nombre de usuario-->
			<label for="correodeusuario">Email</label>
			<input type="text" name="emausu" placeholder="Correo Electronico"> 
			<!--Contraseña-->
			<label for="clavedeusuario">Clave</label>
			<input type="password" name="pasusu" placeholder="Clave de usuario">

			<!--ESTA LOGICA NOS ESCRIVIR A LOS ERRORES EN EL LOGIN GRACIAS A LOGINLOGICA.PHP TABN-->
				<?php
					if(isset($_GET['e'])){ /*si existe el parametro e de error por la url ejecutate y es un get porque lo devuelve en la url*/
						switch ($_GET['e']) {
							case '1': /*si es el error uno por la url*/
								echo '<p>Error de conexion</p>';
								break;
							case '2': /*si es el error uno por la url*/
								echo '<p>Email invalido</p>';
								break;
							case '3': /*si es el error uno por la url*/
								echo '<p>Contraseña incorrecta</p>';
								break;
							
							default:
								# code...
								break;
						}

					}
				?>

			<input type="submit" value="Iniciar sesion">

			<a href="#">Has olvidado tu clave?</a><br>
			<a href="#" >Aun no estas registrado?</a>
		</form>
	</div>
</body>
</html>