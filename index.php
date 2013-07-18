<?php
$raiz ="./"; //distancia hasta la raiz, empieza en punto y termina en barra
include_once("modelo/funciones-comunes.php");

$descripcion ="Portal para el aplicativo de presupuestos";
$keywords ="presupuestos, constructora, normas APU";
$titulo_pagina="Presupuestos :: Construinversiones";

include("includes/cabecera.php");

?>  

      <div class="carousel slide" id="carousel-456747">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-456747">
					</li>
					<li data-slide-to="1" data-target="#carousel-456747" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-456747">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img alt="" src="images/slide-01.jpg" />
						<div class="carousel-caption">
							<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item active">
						<img alt="" src="images/slide-02.jpg" />
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="images/slide-03.jpg" />
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div> <a data-slide="prev" href="#carousel-456747" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-456747" class="right carousel-control">›</a>
			</div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Nosotros</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">Ver mas &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Servicios</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">Ver mas &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Contacto</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">Ver mas &raquo;</a></p>
        </div>
      </div>

      <hr>
      
     <?php
	include("includes/pie.php");
    ?>