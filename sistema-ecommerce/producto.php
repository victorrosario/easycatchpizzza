<!--ESTO ES PARA CUANDO HACES CLICK EN LA IAMGEN DE LSO PRODUCTOS NOS REDIRIJE A OTRA PAGINA CON LA DESCRICION DE LOS PRODUCTOS MAS GRANDE Y SI QUEREMOS COMPRAR -->

<?php
session_start(); /*para que reconosca que hemos iniciaodo session */

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi sistema E-Commerce Descripcion de los productos</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
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
		<input type="text" id="idbusqueda" placeholder="Encuentra todo lo que necesitas...">
		<button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
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


			    <a href="carrito.php"><div class="item-option" title="Mis Compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div></a>
	</div>
</header>
<!--FIN DE LA CABECERA-->

<!--CUERPO o contenido principal-->
<div class="main-content">
	<div class="content-page">
			<section>
				<div class="part1">
					<img id="idimg" src="./assets/products/PizzaLeonardo.png" alt="">
				</div>
				<div class="part2">
					<h2 id="idtitle">NOMBRE PRINCIPAL</h2>
					<h3 id="iddescription">Descripcion Del Producto</h3>
					<h1 id="idprice">$/. 35.<span>99</span></h1>
					<button onclick="iniciar_compra()" >Comprar</button>
				</div> 
			</section>
		<div class="title-section">Productos Destacados</div>
		<div class="products-list" id="space-list">
			
			
			
			
			
			

		</div>
	</div>
	
	</div>
	
	<script type="text/javascript">
	var p ='<?php echo $_GET["p"]; ?>';
	</script>	
	<script type="text/javascript">
		$(document).ready(function(){
			
			$.ajax({
				url:'servicios/producto/get_all_products.php',
				type:'POST',
				data:{}, /*data es la inforamcion de la consulta*/
				success:function(data){ /*le ponemos como parametro data que es la inforamcion de la consulta*/ 
					console.log(data);
					let html='';
					for (var i = 0; i <data.datos.length;  i++) {
						if(data.datos[i].codpro==p){ /*esto hace que si le caundo le de click a la imagen ponga la foto de la imagen que es por la informacion q se le pasa por url*/ 
							document.getElementById("idimg").src="assets/products/"+data.datos[i].rutimapro;
							document.getElementById("idtitle").innerHTML=data.datos[i].nompro;
							document.getElementById("idprice").innerHTML=formato_precio(data.datos[i].prepro);
							document.getElementById("iddescription").innerHTML=data.datos[i].despro;
							

						}
						html+=
							'<div class="product-box">'+
							'<a href="producto.php?p='+data.datos[i].codpro+'">'+
									'<div class="product">'+
										'<img src="assets/products/'+data.datos[i].rutimapro+'" alt="">'+
										'<div class="detail-title">'+data.datos[i].nompro+'</div>'+
										'<div class="detail-description">'+data.datos[i].despro+'</div>'+
										'<div class="detail-price">'+formato_precio(data.datos[i].prepro)+'</div>'+
									'</div>'+
								'</a>'+
							'</div>';
						
						
					}
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			let svalor=valor.toString(); //tranformamos este valor a string
			let array = svalor.split("."); // separa los decimales
			return "$/. "+array[0]+".<span>"+array[1]+"</span>"; // 10.99 el 10 es indice 0 y el 99 es indice 1 por la funcion split
		}
		function iniciar_compra(){ /*FUNCION que sirva para que  al darle al botom combra  funcione la compra y si el usuario no se a loquwado se registre o loquee*/ 
			$.ajax({
				url:'servicios/compra/validar_inicio_compra.php', /*aqui esta el codigo para viladar la seccion*/ 
				type:'POST',
				data:{
					codpro:p /*este es el parametro que estamos pasando que es la variable p que es la que nos da el producto seleccionado atravez de la url*/
				}, /*data es la inforamcion de la consulta*/
				success:function(data){ /*le ponemos como parametro data que es la inforamcion de la consulta*/ 
					console.log(data);
					if(data.state){
						alert(data.detail);
					}else{
						alert(data.detail);
						if(data.open_login){
							open_login();/*manda al usuario al login si no esta registrado*/
						}
					}
				},
				error:function(err){
					console.error(err);
				}
			});
		}
		function open_login(){
				window.location.href="login.php"; /*es la funcion que redirije al login.php*/
			}
		
		
</script>

</body>
</html>