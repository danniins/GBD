<?php
include 'global/config.php';
include 'global/conexion.php';
include './carrito.php';
include 'templates/cabecera.php';
?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="carouselExampleIndicators" class="container-fluid mb-4 carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="bg-dark" data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                    <li class="bg-dark" data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    <li class="bg-dark" data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                    <li class="bg-dark" data-target="#carouselExampleIndicators" data-slide-to="3" class="active"></li>
                </ol>
                <div class="carousel-inner" id="slider">
                    <div class="carousel-item">
                        <img height="400px" class="d-block w-100" src="img/slide1.jpeg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Rápidos y seguros.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img height="400px" class="d-block w-100" src="img/slide2.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>En cualquier sitio.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img height="400px" class="d-block w-100" src="img/slide3.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cualquier tipo.</h5>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img height="400px" class="d-block w-100" src="img/slide4.png" alt="Fourth slide">
                        <div class="carousel-caption d-none d-md-block text-dark">
                            <h5>Atrevete!</h5>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev bg-dark" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-dark" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
            <div class="container bg-dark rounded text-light p-5 mb-3">
                <h2>¿Por qué elegir nuestros productos?</h2>
                <hr class="bg-warning">
                <h4>Los precios bajos que manejamos:</h4>
                <p>Nuestros productos mantienen un percio de los más bajos en el mercado.</p>
                <h4>Las marcas que manejamos:</h4>
                <p>Trabajamos con primeras marcas con una calidad excelente como podría ser la marca <i>Kim Kat</i> o <i>Hirotaka.</i></p>
                <h4>Ofrecemos los productos más novedosos del mercado:</h4>
                <p>Nuestros clientes provienen de los segmentos más jóvenes, quienes buscan y prefieren utilizar productos innovadores.</p>
                <h4>El valor añadido que ofrecen nuestros servicios:</h4>
                <p>Nuestra garantía en los productos brinda un valor añadido al cliente en la venta, si un producto no tiene las prestaciones mínimas existe una garantía</post-venta>.</p>
                <hr class="bg-warning">
                <span>¿Te hemos convencido? Visita nuestra <a href="mostrarTienda.php">Tienda</a></span>
                <img class="float-right" width="50px" src="./img/logo.png">
            </div>
            <div class="row w-100 m-auto">
				<div class="accordion w-100" id="accordionExample">
					<div class="card">
					    <div class="card-header" id="headingOne">
					      	<h2 class="mb-0">
						        <button class="btn btn-link text-light bg-warning" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Coméntanos
						        </button>
					      	</h2>
					    </div>
					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					      	<div class="card-body">
					        	<div class="input-group mb-3">
							  		<div class="input-group-prepend">
							    		<span class="input-group-text" id="basic-addon1">Email</span>
							  		</div>
							  		<input type="text" class="form-control" placeholder="Correo o nombre de usuario" aria-label="Username" aria-describedby="basic-addon1">
								</div>
								<div class="input-group">
							  		<div class="input-group-prepend">
							    		<span class="input-group-text">Comentario</span>
							  		</div>
							  		<textarea class="form-control" aria-label="With textarea" placeholder="Comenta tu opinión"></textarea>
								</div>
					      	</div>
					      	<div class="card-footer"><button type="submit" class="mb-2 btn btn-warning float-right">Enviar</button></div>
					    </div>
					</div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-link text-light bg-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				     		Contacta con Nosotros
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      	<div class="card-body">
					        <select class="form-control form-control-lg">
							  <option disabled="yes">De que se trata tu petición?</option>
							  <option>Sugerencia</option>
							  <option>Reportar un error</option>
							  <option>Necesito ayuda</option>
							</select>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon2">Email</span>
								</div>
								<input type="text" class="form-control" placeholder="Correo o nombre de usuario" aria-label="Username" aria-describedby="basic-addon2">
							</div>
							<div class="input-group">
							  	<div class="input-group-prepend">
							    	<span class="input-group-text">Descripción</span>
							  	</div>
							  	<textarea class="form-control" aria-label="With textarea" placeholder="Dinos tu situación"></textarea>
							</div>
							<div class="card-footer"><button type="submit" class="mb-2 btn btn-warning float-right">Enviar</button></div>
				    	</div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h2 class="mb-0">
				        <button class="btn btn-link text-light bg-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          Nuestra sede
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body">
				        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12708.128083496955!2d-3.698220565166154!3d37.223214777815905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fe396562a841%3A0xba6ef7eda8fabb83!2s18230%20Atarfe%2C%20Granada!5e0!3m2!1sen!2ses!4v1586450556006!5m2!1sen!2ses" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="w-100"></iframe>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
        <script>
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
        </script>
<?php
include 'templates/pie.php';
?>