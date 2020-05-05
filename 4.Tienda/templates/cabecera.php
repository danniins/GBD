<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Asgard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		    <a class="navbar-brand" href="./index.php">
		    	<img src="./img/logo.png" height="60px" width="70" class="d-inline-block align-top" alt="">
		  	</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>
	  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="nav nav-tabs mb-3 bg-dark" id="pills-tab" role="tablist">
			  		<li class="nav-item">
			    		<a class="nav-link text-warning" href="./index.php">Inicio</a>
			  		</li>
			  		<li class="nav-item">
			  			<a class="nav-link text-warning" href="./mostrarTienda.php">Tienda</a>
			  		</li>
			  		<li class="nav-item">
			    		<a class="nav-link text-warning" href="./mostrarCarrito.php">Carrito(<?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);?>)</a>
			  		</li>
                </ul>
                <h1 class="pl-5 text-warning">Asgard ~ Piercing ~ Shop</h1>
            </div>
              

			<button type="button" class="btn btn-warning text-dark mr-1" data-toggle="modal" data-target="#login">
			  Login
			</button>

			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
			      		<div class="modal-header bg-warning text-dark">
				        	<h5 class="modal-title" id="login">Inicia sesión</h5>
				        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          		<span aria-hidden="true">×</span>
				        	</button>
			      		</div>
			      		<div class="modal-body bg-dark text-light">
				        	<form>
						  		<div class="form-group">
						    		<label for="login">Email</label>
						    		<input type="email" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Introduce tu email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required="yes">
						  		</div>
						  		<div class="form-group">
						    		<label for="login">Contraseña</label>
						    		<input type="password" class="form-control" id="login" placeholder="Introduce tu contraseña" minlength="8" required="yes">
						  		</div>
					      		<div class="modal-footer">
					        		<button type="submit" class="btn btn-light text-dark">Iniciar sesión</button>
					      		</div>
				      		</form>
			    		</div>
			  		</div>
				</div>
			</div>

			<button type="button" class="registro btn btn-warning text-dark" data-toggle="modal" data-target="#registro">
		  		Registro
			</button>
			<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="registro" aria-hidden="true">
			  	<div class="modal-dialog modal-dialog-centered" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header bg-warning text-dark">
			        		<h5 class="modal-title" id="registro">Regístrese</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			    	<div class="modal-body bg-dark text-light">
			      		<form class="needs-validation" novalidate="">
			      			<div class="form-group">
			      				<label for="registro">Nombre</label>
			      				<input type="name" class="form-control" id="registro" placeholder="Introduce tu nombre" required="yes">
			      			</div>
			      			<div class="form-group">
				      			<label for="registro">Apellidos</label>
				      			<input type="name" class="form-control" id="registro" placeholder="Introduce tus apellidos" required="yes">
			      			</div>
			        		<div class="form-group">
							    <label for="registro">Email</label>
							    <input type="email" class="form-control" id="registro" aria-describedby="emailHelp" placeholder="Introduce tu email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required="yes">
							</div>
							<div class="form-group">
							    <label for="registro">Contraseña</label>
							    <input type="password" class="form-control" id="registro" placeholder="Introduce tu contraseña" minlength="8" required="yes">
							</div>
							<div class="form-group">
								<div class="btn-group" role="group" aria-label="genero">
									<label class="sexo" for="registro">Sexo:</label> 
								  	<button type="button" class="btn btn-warning">Hombre</button>
								  	<button type="button" class="btn btn-warning">Mujer</button>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-light text-dark">Refistrarse</button>
							</div>
			    		</form>
			  		</div>
				</div>
			</div>
        </div></nav>