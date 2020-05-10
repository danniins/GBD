<?php
///OBJETOS USADOS EN EL CODIGO
	class objects{

		function __construct(){}

		public function botonLogin(){
			?>
			<button type="button" class="btn btn-warning text-dark mr-1" data-toggle="modal" data-target="#login">
				Login
			</button><?php
		}
		public function botonRegistrar(){
			?>
			<button type="button" class="registro btn btn-warning text-dark" data-toggle="modal" data-target="#registro">
				Registro
			</button><?php
		}
		public function botonLogout(){
			?>
			<form method="POST" action="">
				<button type="submit" name="logout" value="logout" class="btn btn-warning text-dark mr-1">
					Cerrar sesión
				</button></form><?php
		}
	}
?>