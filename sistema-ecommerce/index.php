
<?php
session_start(); /*para iciciar seccion en index cuando hacemos login*/


?>

<!DOCTYPE html>
<html>
<head>
	<title> easycatchpizza E-Commerce</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> <!--hay qye poner este4 de primero para que las imagenes se vean y todo funcione-->
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<!--CSS PRINCIPAL-->
	<link rel="stylesheet" href="css/estiloecommerprincipal.css">
	

	
</head>
<body>
	
<!--Cabecera-->

	<header>
		<div class="logo-place"><a href="../index.php"><img src="assets/Logo-coco4.2.1.png" alt=""></a></div>
		<div class="search-place">
			<input type="text" id="idbusqueda" placeholder="Encuentra Todo Lo Que Necesitas En EasyCatchPizza...">
			<button class="btn-main btn-search" ><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>
		<div class="options-place">
				<?php
				/*aqui ponemos la logica para que si el usuario esta loqueado se quiten los iconos*/
				if(isset($_SESSION['codusu'])){ /*si el codigo de usuario exixte osea si esta el id del usuario porque esta loqueado  ejecutate ahora si existe una cuenta loqueada quita lso iconos de login y registrate */
					 /*ponemos el nombre del usaurio loqueado en la barra  al lado del carrito de compras*/
					echo '<div class="item-option" ><i class="fa fa-user-circle-o" aria-hidden="true"></i><p>'.$_SESSION['nomusu'].'</p></div>'; /*vamos a hacer que se vea el logo que tiene forma de usaurio para que se vea mejor*/

					 echo' <a href="logout.php"> <div class="item-option" title="cerrar session"><i class="fa fa-user" aria-hidden="true"></i></div></a> ';/*asi aparecera el icono de cerrar session*/


				}else{


				?> <!--hasta este punto esque php agarra el if-->
				<a href="#"><div class="item-option" title="Registrate"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div></a>
				<a href="./login.php"><div class="item-option" title="Inicia Session"><i class="fa fa-sign-in" aria-hidden="true"></i></div></a>
				<?php
				} /*y hasta aqui agarra todo el else el php es decir  todo ese conrenido esta dentro del else  es un poco estraña como funciona pero asi es igual hay que investigar
	*/
				?>


			   <a href="carrito.php"> <div class="item-option" title="Mis Compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div></a>
		</div>
	</header>
		
	<!--FIN DE LA CABECERA-->

	<!--CUERPO o contenido principal-->

	<div class="main-content">
			<div class="content-page">
				<div class="title-section">Todos nuestros combos y promociones de EasyCathPizza</div>
				<div class="products-list" id="space-list">
					
				</div>
			</div>
	</div>
	<script type="text/javascript" >
		$(document).ready(function(){ // para indicar en que momento lanzar la consulta, es decir que cuando mi pantalla este lista haga la siquiente funcion
		// este ajax es el que pide la consulta a la base de datos desde el archibo get_all_products.php
			$.ajax({
				url:'servicios/producto/get_all_products.php', // url de donde voy a consultar
				type:'POST', // tipo de peticion
				data :{}, // data son los parametros que se envian 
				success:function(data){  // success es cuando la consulta a la base de datos a sido correcta y devuelve el resultado Data es lo que resive la inforamcion de esa consulta
					console.log(data); // para ver lo que salga en el json
					let html=''; /*variable html*/
					for ( var i =0; i< data.datos.length; i++ ) { /*todo esto sale de get_all_products*/
							 html+=
								'<div class="product-box">'+
									'<a href="producto.php?p='+data.datos[i].codpro+'">'+ /*aqui le estamos indicando que cuando haga click valla a producto.php y seleccione la imagen rorrespondiente segun el id se se lo pasamos por url*/
										'<div class="product">'+
											'<img src="assets/products/'+data.datos[i].rutimapro+'" alt="">'+
											'<div class="detail-title">'+data.datos[i].nompro+'</div>'+
											'<div class="detail-description">'+data.datos[i].despro+'</div>'+
											'<div class="detail-price">'+formato_precio(data.datos[i].prepro)+' </div>'+
										'</div>'+
									'</a>'+
								'</div>';
						
						
					}
					document.getElementById('space-list').innerHTML=html; /*estamos pegando todo lo que esta drentro de la varaible html*/
				},
				error:function(err){
					console.error(err);
				}
				
			});
		}); 
		function formato_precio(valor){
			let svalor = valor.toString();
			let array= svalor.split(".");
			return "$/. " +array[0]+".<span>"+array[1]+"</span>";
		}
		
	</script>
		
</body>
</html>