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

								

	
		<?php 
		$idCita=(int)$_REQUEST['noCitaM'];		
		$citaM=$_REQUEST['tipoCitaM'];
		$fechaM=$_REQUEST['fechaM'];
		$horaM=$_REQUEST['horaM'];

		$conexion=mysqli_connect('localhost','root','','oftamologia');

		

		$coincidencias=mysqli_query($conexion,"select * from citas where hora='$horaM' AND fecha='$fechaM'");
		$encontrados=mysqli_num_rows($coincidencias);

	
		if($encontrados>=1)
		{
			?> 


				 <div style="margin-top: 50px; border: solid;">
			 <center>
				<h1>Esa hora ya se encuentra registrada para otra cita, por favor pulse 
				el boton para regresar al formulario y seleccionar otra hora</h1>
				<br>
				
			
				</div>
				<br>
				<button style="margin-left: 40%;" onclick="goBack()" class="btn btn-primary"> VOLVER AL REGISTRO </button>
			</center>
				
				<script>
				function goBack() 
				{
				  window.history.back();
				}
				</script>



			
			<?php 
		}else
		{

			$datos=mysqli_query($conexion,"update citas set tipoCita='$citaM',fecha='$fechaM',hora='$horaM' Where idCita=$idCita") or die("Problemas al actualizar".mysqli_error($conexion));


			$datos=mysqli_query($conexion,"select * from citas where idCita=$idCita") or die(mysqli_error());
			$encontrados=mysqli_num_rows($datos);

				if($encontrados>=1)
				{
				?>
							<center><h1>Modificacion De Su Cita fue Exitosa</h1></center>

					<center>
						<table border="solid" style="margin-top: 50px;"; class="table">
						<th colspan="12"><font size="10px" style="text-align: center;">NUEVOS DATOS DE SU REGISTRO DE CITA</font></th> 
						
						<tr class="thead-dark">
						<th>No Cita</th>
						<th>tipo de cita</th>
						<th>Nombre</th>			
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Edad</th>	
						<th>Genero</th>	
						<th>Telefono</th>
						<th>Fecha</th>
						<th>Hora</th>	
						</tr>

						<?php
						while ($row = mysqli_fetch_array($datos,MYSQLI_ASSOC))
						{	?>
								
							<tr>
								<td><?php echo $row['idCita'];?></td>
								<td><?php echo $row['tipoCita'];?></td>
								<td><?php echo $row['nombre'];?></td>
								<td><?php echo $row['apellidoPaterno'];?></td>
								<td><?php echo $row['apellidoMaterno'];?></td>
								<td><?php echo $row['edad'];?></td>
								<td><?php echo $row['genero'];?></td>
								<td><?php echo $row['telefono'];?></td>
								<td><?php echo $row['fecha'];?></td>
								<td><?php echo $row['hora'];?></td>
								
							</tr>		

						<?php
						} 
						?>
					</table>
					<br><br>	
					<a href="PaginaPrincipalCitas.html" class="btn btn-primary">REGRESAR A LA PAGINA PRINCIAPL</a>
 			
					
					</center>

					<?php
				}else
				{
					?>
					<div style="margin-top:  200px; border: solid;"></div>
					<center><h1>NO SE ENCONTRA REGISTRADA LA CITA CON ESE NUMERO</h1>
						<a href="ConsultarCita.html" class="btn btn-primary">Regresar a consular una cita</a>

				

		
					</center>
				<?php 	
				}

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