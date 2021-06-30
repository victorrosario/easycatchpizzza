
<!DOCTYPE html>
<html>
<head>
	<title>Mi sistema E-Commerce</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<!--CSS PRINCIPAL-->
	<link rel="stylesheet" href="css/index.css">

	
</head>
<body>
	
<!--Cabecera-->

<header>
	<div class="logo-place"><a href="index.php"><img src="assets/logo.png" alt=""></a></div>
	<div class="search-place">
		<input type="text" id="idbusqueda" placeholder="Encuentra todo lo que necesitas...">
		<button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
	<div class="options-place">
	<?php
		
		?>

			
		<div class="item-option" title="Registrate"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
		<div class="item-option" title="Ingresar"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
		<?php
		
		?>
		<div class="item-option" title="Mis Compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>

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
					<h1 id="idprice">$/. 35.<span>99</span></h1>
					<h3 id="iddescription">Descripcion Del Producto</h3>
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
				for (var i = 0; i < data.datos.length;  i++) {
					if(data.datos[i].codpro==p){
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
	function iniciar_compra(){
		$.ajax({
			url:'servicios/compra/validar_inicio_compra.php',
			type:'POST',
			data:{
				codpro:p
			}, /*data es la inforamcion de la consulta*/
			success:function(data){ /*le ponemos como parametro data que es la inforamcion de la consulta*/ 
				if(data.state){

				}else{
					alert(data.detail);
					if(data.open_login){
						open_login();
					}
				}
			},
			error:function(err){
				console.error(err);
			}
		});
	}
	function open_login(){
			window.location.href="login.php";
		}
	
	
</script>

</body>
</html>