<?php
include_once './app/Conexion.inc.php';
include_once './app/RepositorioUsuario.inc.php';
$titulo = "blog de victor";
include_once './plantillas/documento-declaracion.inc.php';

include_once './plantillas/navbar.inc.php';

?>


    <!-- baarra de navegacion con boostrap-->

   
    <!-- fin de la barra de navegacion con bootrap-->

    <div class="banner"> 
        <img src="img/Logo-coco4.2.1.png" alt"" title="" >
         <div class="contenedor">
        <h1 class="banner__titulo">EASYCATCHPIZZA</h1>
        <p class="banner__txt">Bienvenidos</p>
        </div>
    </div>
   
    <main class="main">
        
             <section class="info">
                 <div class="contenedor">
          <article class="info__columna">
            <img src="img/arturopizza.jpg" alt="" class="info__img">
            <h2 class="info__titulo">el mejor equipo de trabajo </h2>
            <p class="info__txt">En easycatchpizza  tenemos un equipo de trabajo  que siempre estamos en constante evolucion y desarrollo para poder brindarte la mejor calidad y servicio </p>
          </article>
          <article class="info__columna">
            <img src="img/amoralapizza.jpg" alt="" class="info__img">
            <h2 class="info__titulo">El amor no tiene fronteras</h2>
            <p class="info__txt">en easycatchpizza entendemos que lo que nos une y nos identifica con nuestro clientes  es el amor por la pizza y si tu eres un amante de la pizza con piña estas en el ligar indicado </p>
          </article>
          <article class="info__columna">
            <img src="img/redessocialespizza" alt="" class="info__img">
            <h2 class="info__titulo">Redes Sociales</h2>
            <p class="info__txt">Siquenos en nuestras redes sociales para que estes al dia de todas nuestras nuevas promociones</p>
          </article>
            </div>
          </section>
                     
            <section class="platos">
                <div class="contenedor">
                <h2 class="platos__titulo">Promociones Especiales</h2>
                <p class="platos__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                    <div class="platos__columna">
                        <img src="img/Promocion_1.png" alt="" class="platos__img">
                        <h3>Promocion 1</h3>
                    </div>
                <div class="platos__columna">
                        <img src="img/promocion2.jpg" alt=""  class="platos__img">
                        <h3>Promocion 2</h3>
                    </div>
                <div class="platos__columna">
                        <img src="img/promocion3.jpg" alt=""  class="platos__img">
                        <h3>Promocion 3</h3>
                    </div>
                <div class="platos__columna">
                        <img src="img/promocion4.jpg" alt=""  class="platos__img">
                        <h3>Promocion 4</h3>
                    </div>
            </section>
            <section class="mapa">
                  <div class="contenedor">
                <div class="mapa__iframe">
                     <h3>DONDE ESTAMOS?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3927.2063359610024!2d-67.99424218520443!3d10.163876792738954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sve!4v1625044543438!5m2!1ses!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                 </div>
            </section> 
    </main>
    <footer class="footer">
         <div class="social">
            <img src="img/icono1.png" alt"" title="" >
             <img src="img/icono2.png" alt"" title="" >
             <img src="img/icono3" alt"" title="" >
             </div>
         <p class="copy">&copy; Todos los derechos reservados a Richard Apaico | 2018</p>
         </footer>
          

    <!-- FIN DE LA REGILLA DE LA PAGINA-->

  <?php
                include_once './plantillas/documento-cierre.inc.php';
  ?>