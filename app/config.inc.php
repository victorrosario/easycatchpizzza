<?php


////ESTA ES LA FORMA CORREXTA DE HACERLO CON CONSTANTES PARA NO TENER PROBLEAMS MAS ADELANTE 

define('NOMBRE_SERVIDOR','localhost'); // usamos define para crear una constante estas son variables que nunca camban su valor 
define('NOMBRE_USUARIO','root'); // usamos define para crear una constante estas son variables que nunca camban su valor 
define('PASSWORD',''); // usamos define para crear una constante estas son variables que nunca camban su valor 
define('NOMBRE_BD','easycatchpizza'); // usamos define para crear una constante estas son variables que nunca camban su valor 

// rutas de la web 
define("SERVIDOR", "http://localhost/practicablock");
define("RUTA_REGISTRO", SERVIDOR . "/registro.php");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR. "/registro-correcto.php");
define("RUTA_LOGIN", SERVIDOR. "/login.php");
define("RUTA_TIENDA_ONLINE", SERVIDOR. "/sistema-ecommerce/index.php ");
define("RUTA_FAVORITOS", SERVIDOR. "#");
define("RUTA_AUTORES", SERVIDOR. "#");


?>