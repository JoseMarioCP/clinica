<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
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
		$idCita=(int)$_REQUEST['noCita'];
		$conexion=mysqli_connect('localhost','root','','oftamologia');

		//echo " su id ".$idCita ;

		$datos=mysqli_query($conexion,"select * from citas where idCita=$idCita") or die(mysqli_error());
		$encontrados=mysqli_num_rows($datos);
		//echo " encontrado".$encontrados;
		
		
		if($encontrados>=1)
		{
			?> 
			<center>
			<table border="solid" style="margin-top: 50px; background-color: white;" class="table">





			<th colspan="12"><font size="10px">DATOS DE SU REGISTRO DE CITA</font></th> 
			
			<tr class="thead-dark">
			<th>No Cita</th>
			<th>tipo de cita</th>
			<th>curp</th>
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
					<td><?php echo $row['curp'];?></td>
					<td><?php echo $row['nombre'];?></td>
					<td><?php echo $row['apellidoPaterno'];?></td>
					<td><?php echo $row['apellidoMaterno'];?></td>
					<td><?php echo $row['edad'];?></td>
					<td><?php echo $row['genero'];?></td>
					<td><?php echo $row['telefono'];?></td>
					<td><?php echo $row['fecha'];?></td>
					<td><?php echo $row['hora'];?></td>
					<td><button onclick="ModificarCita()" class="btn btn-primary">Modificar Cita</button></td>
					<td><button onclick="EliminarCita()" class="btn btn-primary">Eliminar Cita</button></td>	
						<!--
					<td><a href="modificarCita.html" class="btn btn-primary">MODIFICAR CITA</a></td>
					<td><a href="eliminarMiCita.html" class="btn btn-primary">ELIMINAR CITA</a></td>
						-->
				</tr>		

				<?php
			} 
				?>
		</table>


		

			<br>
			<a href="ConsultarCita.html"  class="btn btn-primary">Regresar..</a>


													<!-- CONTENEDOR PARA HACER LA MODIFICACION-->

		</center>
			
			<div id="Modificar" style="display: none;background-color: white;margin-left: 7%;margin-right: 7%;margin-top:  20px;">
				

					<!--
					<form style="margin:100px; margin-top: 5px;" action="http://nortty.tk/formulario/modificarDatosCita.php" method="get">
					-->

					<form style="margin:100px; margin-top: 5px; background-color: white;" action="http://localhost:8888/formulario/modificarDatosCita.php" method="get">
						  <div class="form-group">
						   
						    <br>	
						   <li> <label for="tipoCita" >Tipo de cita</label>	</li>		
							<select  name="tipoCitaM" id="tipoCitaM" required class="btn btn-primary dropdown-toggle">
								<option  value="">--seleccione--</option>
								<option value="Examen de vista">Examen de vista</option>
								<option value="Examen de vista y compra de lentes">Examen de vista y compra de lentes</option>			
							</select>
								
								<br>	
								<br>

								<!--
								<li><p> Fecha de la cita</p></li>
								<input value="" style="size: 5px;" type="date" class="form-control" name="fechaM"  id="fechaM" required />
								-->
								<br>
								<label>Fecha de la cita:</label>  
								<input value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>" type="date" class="form-control" name="fechaM"  id="fechaM" required >
				

								<br>
								<li><label>Hora de la cita</label></li>
								<select  name="horaM" id="horaM" required class="btn btn-primary dropdown-toggle">
								<option  value="">--seleccione--</option>
								<script>

										var intervalo=15;
										var horaEntrada=8;
										var minutos=0;
										select = document.getElementById("horaM");
										
										for(i = 1; i < 48; i++)
										{
										  option = document.createElement("option");

										  if(minutos<1)
										  {
										  	option.value = horaEntrada+":"+minutos+"0";
										 	option.text = horaEntrada+":"+minutos+"0";
										  }else
										  {

										  option.value = horaEntrada+":"+minutos;
										  option.text = horaEntrada+":"+minutos;
										  }

										  select.appendChild(option);

										  	minutos+=intervalo;

											if(minutos>=60)
											{
												horaEntrada++;
												minutos=0;
											}
										}
										
									</script>
							
						</select>



						<!-- CAMPO DE INPUT DEL IdCinta que esta oculto-->

							 <label for="exampleInputEmail1" style="visibility: hidden;">Introduzca el numero de su cita</label>
						    <input type="text" style="visibility: hidden;" value=<?php echo $idCita;?> class="form-control"  name="noCitaM" id="noCitaM" aria-describedby="emailHelp"placeholder="Numero de cita" required  pattern="[0-9]{1,4}" title="Solo Numeros"/>



						  </div>
					  <div >
								<br>
							<button type="submit" class="btn btn-primary" onclick="cancelarModi()">CANCELAR MODIFICACION</button>
							<!-- <a href="PaginaPrincipalCitas.html" class="btn btn-primary" role="button" >CANCELAR</a> -->
						  	<button type="submit" class="btn btn-primary">MODIFICAR</button>


					 </div>
						 
						</form>
					

			</div>


			<div id="Eliminar" style="display: none;">
				
								<!--
								<form  style="margin:100px; margin-top: 50px" method="get" action="http://nortty.tk/formulario/eliminarCita.php" method="get">
								-->

								<form  style="margin:100px; margin-top: 50px;" method="get" action="http://localhost:8888/formulario/eliminarCita.php" method="get">


								  <div style="background-color: red;">
								  	

								  
								 <center> <h3 style="color: white;">¿Seguro que quiere elimnar su cita?</h3>
								  <button  type="submit" class="btn btn-primary" style="margin-right: 10px; padding-right:20px;">Si</button>
								 <button type="button" class="btn btn-primary" onclick="CancelarEliminacion()">No</button>
								</center>
								</div>


									<!-- CAMPO DE INPUT DEL IdCinta que esta oculto-->
								<div class="form-group">
								    <label for="exampleInputEmail1" style="visibility: hidden;">Introduzca el numero de su cita</label>
								    <input type="text" style="visibility: hidden;" value=<?php echo $idCita;?> class="form-control"  name="noCita" id="noCita" aria-describedby="emailHelp" placeholder="Introduzca su numero de cita" required   required  pattern="[0-9]{1,4}" title="Solo Numeros">
								   
								  </div>
								</form>


								

			</div>



			<?php 
		}
		else
		{		
		?>

				<div style="margin-top: 200px; border: solid;">
				<center><h1>NO SE ENCONTRO REGISTRADA LA CITA CON ESE NUMERO</h1>
					<br>
					<a href="ConsultarCita.html" class="btn btn-primary">Regresar a consular una cita</a>

					</center>
					</div>
		<?php 	
		}	
		?>


		<!-- -SCTRITPS--> 

		<script>
		function ModificarCita() {
			CancelarEliminacion();
		 	document.getElementById("Modificar").style.display = "block";
		}


		function EliminarCita()
		{
			cancelarModi();
			document.getElementById("Eliminar").style.display = "block";
		}
		

		 function cancelarModi()
		 {
		 	
		 	

		 	document.getElementById("Modificar").style.display = "none";
		 }

		 function CancelarEliminacion()
		 {
			document.getElementById("Eliminar").style.display = "none";
		 }

</script>

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