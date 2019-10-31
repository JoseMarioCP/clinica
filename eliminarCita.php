<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<title></title>
</head>
<body style="background-color: #CCCBCB">

								<nav class="navbar navbar-light bg-light" style="margin-bottom: 50px">
								  <a class="navbar-brand" href="PaginaPrincipalCitas.html" >HOME</a>
								  <a class="navbar-brand" href="PaginaPrincipalCitas.html" >INFALOUS</a>
								  <form class="form-inline">
								  	
								  </form>
								</nav>

								<center><h1>ELIMINACION DE CITAS</h1></center>


	
	<?php 
		
		//$valor1=(int)$_GET['id'];
		//echo " su id es: ".$valor1;


		$idCita=(int)$_REQUEST['noCita'];	
		$conexion=mysqli_connect('localhost','root','','oftamologia');

		$datos=mysqli_query($conexion,"select * from citas where idCita=$idCita") or die(mysqli_error());
		$encontrados=mysqli_num_rows($datos);

		if($encontrados>=1)
		{
			
			
			//echo " encontrados : ".$encontrados;
			$coincidencias=mysqli_query($conexion,"delete from citas where idCita=$idCita");
			?>

				<div style="margin:50px">
				 <center>
					<h1>Cita Borrada</h1>
						<a href="PaginaPrincipalCitas.html" class="btn btn-primary">Regresar a la pagina principal</a>

				</center>
			</div>

			<?php 
		}else
		{
			?>

			<div style="margin: 100px"></div>
			<center><h1>NO SE ENCONTRO REGISTRADA LA CITA CON ESE NUMERO</h1>
				<br>
			<a href="PaginaPrincipalCitas.html" class="btn btn-primary">Regresar a la pagina principal</a>

			</center>

			<?php
		}	
	?>

				<div class="card" style="margin:50px ">
				 
				  <div class="card-body">
			<center> 
				<p class="card-title center">
				   		Infosalus
					Acerca de infosalus.com | Aviso Legal | Política de Cookies | Política de Privacidad | Kiosko Google Play | Hemeroteca
					<br>
					<font size="2">© 2019 Europa Press. Está expresamente prohibida la redistribución y la redifusión de todo o parte de los contenidos de esta web sin su previo y expreso consentimiento.
					</font>
				</p>
			</center>

</body>
</html>