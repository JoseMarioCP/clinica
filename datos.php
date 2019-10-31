
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
<style type="text/css">
	/*
	body{
		background-color: orange;

	}

	table{
		background: white;
		padding: 20px;
		margin: 10px;
	}*/

</style>

</head>

<body style="background-color: #CCCBCB">

	<nav class="navbar navbar-light bg-light" style="margin-bottom: 50px">
								  <a class="navbar-brand" href="PaginaPrincipalCitas.html" >HOME</a>
								  <a class="navbar-brand" href="PaginaPrincipalCitas.html" >INFALOUS</a>

								  <form class="form-inline">
								  	
								  </form>
								</nav>


	<?php 

		//asiendo la conexion 
	$conexion=mysqli_connect('localhost','root','','oftamologia');
	$miCurp=$_REQUEST['curp'];
	$horaRegistro=$_REQUEST['hora'];
	$fechaRegistro=$_REQUEST['fecha'];

		//consultas para verificar que no esta ya registrado mas de una vez en el mismo dia que selecciono
	$yaRegistrado=mysqli_query($conexion,"select * from citas where fecha='$fechaRegistro' AND curp='$miCurp'");
	$registroEncontrado=mysqli_num_rows($yaRegistrado);

		//consulta para ver si no hay otra cita ocupando la hora ingreso al mismo dia
	$coincidencias=mysqli_query($conexion,"select * from citas where hora='$horaRegistro' AND fecha='$fechaRegistro'");
	$encontrados=mysqli_num_rows($coincidencias);
	

	if($registroEncontrado>=1)
	{
		?>


				<div style="margin: 100px">
					 <center>
						<h1>Ya tiene una cita registrada ese dia que selecciono</h1>
						<br>
											<button onclick="goBack()" class="btn btn-primary"> VOLVER AL REGISTRO </button>

					</center>

				</div>



			<?php 
	}else
	{
		
			if($encontrados>=1)
			{
				 ?>
				
				 <div style="margin: 100px">
					 <center>
						<h1>Esa hora ya se encuentra registrada para otra cita, por favor pulse 
						el boton para regresar al formulario y seleccionar otra hora</h1>
						<br>
						<button onclick="goBack()" class="btn btn-primary"> VOLVER AL REGISTRO </button>
					</center>
				</div>
				

					<?php
			}else
			{
					?>
					<?php 
			
				mysqli_query($conexion,"insert into citas values('','$_REQUEST[tipoCita]','$_REQUEST[curp]','$_REQUEST[nombre]','$_REQUEST[apellidoPaterno]','$_REQUEST[apellidoMaterno]','$_REQUEST[edad]','$_REQUEST[genero]','$_REQUEST[telefono]','$_REQUEST[fecha]','$_REQUEST[hora]')");


			
				?>
				
				<div style="margin: 100px; border:solid;" >

					<center><h1>REGISTRO EXITOSO</h1>
					


					<?php
						//CONSULTA PARA SACAR EL ID DE LA  CITA QUE ACABA DE REGISTRAR
					$ConsultarID=mysqli_query($conexion,"select idCita from citas where hora='$horaRegistro' AND fecha='$fechaRegistro'");
					$row = mysqli_fetch_array($ConsultarID);
					
					//echo "su id es ".$row['idCita'];
						?>
						<h1>EL IDENTIFICADOR DE SU CITA ES: <?php echo $row['idCita']?>
							<br>
							<br>
							GUARDE ESTE NUMERO EN CASO DE QUERER MODIFICAR SU CITA O ELIMINARLA

						</h1>
						<br>
		 			<a href="PaginaPrincipalCitas.html" class="btn btn-primary">REGRESAR A LA PAGINA PRINCIAPL</a>
		 			

		 				<br>
						<br>
					<br>
		 			<a href="ConsultarCita.html" class="btn btn-primary">CONSULTAR CITA</a>
		 			</center>
				</div>
				<?php
			
			/*
					$ConsultarID=mysqli_query($conexion,"select idCita from citas where hora='$horaRegistro' AND fecha='$fechaRegistro'");
					$row = mysqli_fetch_array($ConsultarID);
					
					echo "su id es ".$row['idCita'];
					$cadenaID="http://localhost:8888/formulario/VistaPDF.php?id=".$row['idCita'] ."";
				*/
				?>
							
			<?php 
			} 
			?>




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


			<!-- ZONA PARA LAS FUNCIONES DE JAVASCRIPT-->

			<script>
				function goBack() 
				{
				  window.history.back();
				}
				</script>
	
</body>
</html>