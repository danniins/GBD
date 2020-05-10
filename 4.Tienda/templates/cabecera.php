<!DOCTYPE html>
<!-- CABECERA USADA EN DISTINTOS ARCHIVOS -->
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
		<?php
			include './global/objects.php';
			$objects=new objects();
		?>
    </head>
    <body>
		<!-- MENÚ DE LA CABECERA -->
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
			<?php
			///CÓDIGO DE DIFERENTES BOTONES EN LA CABECERA
				$autenticado=false;
					try{
						if (isset($_POST["login"])){
							$select = $pdo->prepare("SELECT * FROM usuario WHERE email=:email AND passwd=:passwd");
							$email=htmlentities(addslashes($_POST["email"]));
							$passwd=htmlentities(addslashes($_POST["passwd"]));
							$select->bindParam(":email", $email);
							$select->bindParam(":passwd", $passwd);
							$select->execute();
							$numero_registro=$select->rowCount();
							if ($numero_registro!=0){
								$autenticado=true;
								///if (isset($_POST['recordar'])) {setcookie("nombre_usuario", $_POST['email'], time()+86400);}
								$_SESSION["usuario"]=$_POST["email"];
								header('Location:' . getenv('HTTP_REFERER'));
								
							}elseif($numero_registro==0){
								echo "<script>alert('Este usuario no está registrado, por favor registrese...')</script>";
							}
							
						}elseif (isset($_POST["registrar"])) {
							$dni = $_POST["dni"];
							$nombre = $_POST["nombre"];
							$apellidos = $_POST["apellidos"];
							$fechaNacimiento = $_POST["fechaNacimiento"];
							$telefono = $_POST["telefono"];
							$direccion = $_POST["direccion"];
							$provincia = $_POST["provincia"];
							$localidad = $_POST["localidad"];
							$codPostal = $_POST["codPostal"];
							$email = $_POST["email"];
							$passwd = $_POST["passwd"];
							$insert = $pdo->prepare("INSERT INTO usuario (dni, nombre, apellidos, fechaNacimiento, telefono, direccion, provincia,
							localidad, codPostal, email, passwd) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
							$insert->bindParam(':dni', $dni);
							$insert->bindParam(':nombre', $nombre);
							$insert->bindParam(':apellidos', $apellidos);
							$insert->bindParam(':fechaNacimiento', $fechaNacimiento);
							$insert->bindParam(':telefono', $telefono);
							$insert->bindParam(':direccion', $direccion);
							$insert->bindParam(':provincia', $provincia);
							$insert->bindParam(':localidad', $localidad);
							$insert->bindParam(':codPostal', $codPostal);
							$insert->bindParam(':email', $email);
							$insert->bindParam(':passwd', $passwd);		
							$insert->execute([$dni, $nombre, $apellidos, $fechaNacimiento, $telefono, $direccion, $provincia,
							$localidad, $codPostal, $email, $passwd]);
							header('Location:' . getenv('HTTP_REFERER'));
						}elseif (isset($_POST["logout"])){
							session_destroy();
							header('Location:' . getenv('HTTP_REFERER'));
							echo "<script>alert('Sesión cerrada')</script>";
						}
					}catch(Exception $e){
						die ("Error: " . $e->getMessage());
					}
			?>



				<!-- SE INTRODUCEN LOS OBJETOS DESDE LA PAGINA objects.php -->
			<?php
				if (isset($_SESSION["usuario"])) {
					echo $objects->botonLogout();
				}
			?>
			<?php
				if (!isset($_SESSION["usuario"])) {
					echo $objects->botonLogin();
				}
			?>
				<!-- CODIGO DE BOTÓN MODAL DE BOOSTRAP -->
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
				        	<form method="POST" action="">
						  		<div class="form-group">
						    		<label for="login">Email</label>
						    		<input type="email" name="email" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Introduce tu email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required="yes">
						  		</div>
						  		<div class="form-group">
						    		<label for="login">Contraseña</label>
						    		<input type="password" name="passwd" class="form-control" id="login" placeholder="Introduce tu contraseña" minlength="8" required="yes">
								</div>
								<!--<div class="form-row">
									<div class="form-group col-md-6">
										<label for="recordar" class="ml-5">Recuerdame </label>
									</div>
									<div class="form-group col-md-6">
										<input type="checkbox" name="recordar" class="form-control mr-5" id="login">
									</div>
								</div>-->
					      		<div class="modal-footer">
					        		<button type="submit" value="login" name="login" class="btn btn-warning text-dark">Iniciar sesión</button>
					      		</div>
				      		</form>
			    		</div>
			  		</div>
				</div>
			</div>

			<?php
				if (!isset($_SESSION["usuario"])) {
					echo $objects->botonRegistrar(); 
				}
			?>
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
			      		<form method="POST" action="" class="needs-validation" novalidate="">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="registro">Nombre</label>
									<input type="name" name="nombre" class="form-control" id="registro" placeholder="Introduce tu nombre" required>
								</div>
								<div class="form-group col-md-6">
									<label for="registro">Apellidos</label>
									<input type="name" name="apellidos" class="form-control" id="registro" placeholder="Introduce tus apellidos" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="registro">Fecha de nacimiento</label>
									<input type="date" name="fechaNacimiento" class="form-control" id="registro" aria-describedby="emailHelp" required>
								</div>
								<div class="form-group col-md-6">
									<label for="registro">DNI</label>
									<input type="text" name="dni" class="form-control" id="registro" placeholder="000000000-X" minlength="8" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="registro">Teléfono</label>
									<input type="number" name="telefono" class="form-control" id="registro" aria-describedby="emailHelp" placeholder="000000000" required>
								</div>
								<div class="form-group col-md-6">
									<label for="registro">Dirección</label>
									<input type="text" name="direccion" class="form-control" id="registro" placeholder="Calle/Nº" minlength="8" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="registro">Provincia</label>
									<input type="text" name="provincia" class="form-control" id="registro" required>
								</div>
								<div class="form-group col-md-6">
									<label for="registro">Localidad</label>
									<input type="text" name="localidad" class="form-control" id="registro" minlength="8" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="registro">Código Postal</label>
									<input type="number" name="codPostal" class="form-control" id="registro" aria-describedby="emailHelp" max="5" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="registro">Email</label>
									<input type="email" name="email" class="form-control" id="registro" aria-describedby="emailHelp" placeholder="Escriba su Email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
								</div>
								<div class="form-group col-md-6">
									<label for="registro">Contraseña</label>
									<input type="password" name="passwd" class="form-control" id="registro" placeholder="Escriba su contraseña" minlength="8" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" value="registrar" name="registrar" class="btn btn-warning text-dark">Registrarse</button>
							</div>
			    		</form>
			  		</div>
				</div>
			</div>
        </div></nav>