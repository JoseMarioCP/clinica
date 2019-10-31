<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>

	<!--<link rel="stylesheet" type="text/css" href="estilo.css">-->

</head>
<body style="background-color: #CCCBCB">


				<nav class="navbar navbar-light bg-light" style="margin-bottom: 50px">
								  <a class="navbar-brand" href="PaginaPrincipalCitas.html" >HOME</a>
								  <a style="margin-right: 50%;" class="navbar-brand" href="PaginaPrincipalCitas.html" >INFALOUS</a>
				</nav>

							<div style="border: solid;margin-right: 7%;margin-left:7%;background-color: white;">
								<center><h1>Registro De Cita</h1></center>
							</div>

								<!--
					<form style="margin:100px; margin-top: 50px; border: solid; padding: 20px" action="http://nortty.tk/formulario/datos.php" method="get">
					-->
		<form style="margin:100px; margin-top: 50px; border: solid; padding: 20px; background-color:white;" action="http://localhost:8888/formulario/datos.php" method="get">

			<div class="form-group" >
					   
					    <label for="tipoCita">Tipo de cita</label>
					    <select  name="tipoCita" id="tipoCita" required class="dropdown-item" >
							<option  value="">--seleccione--</option>
							<option value="Examen de vista">Examen de vista</option>
							<option value="Examen de vista y compra de lentes">Examen de vista y compra de lentes</option>			
						</select>
							<br>	



						<label for="curp">CURP</label>
					    <input type="text" class="form-control" id="curp" name="curp" aria-describedby="emailHelp" placeholder="Introduzca su CURP" required  pattern="([A-Z]{4})([0-9]{6})([A-Z]{6})([0-9]{2})" title="Curp consta de 18 caracteres"/>

		 				



		 				<label for="tipoCita">Nombre</label>
					    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Introduzca su nombre" required  pattern="[A-Z\s?a-z]{1,15}" title="Solo Letras. mínimo: 2. máximo: 15"/>
					    
						<br>
					    <label for="apellidoPaterno">Apellido Paterno</label>
					    <input type="text" class="form-control" id="apellidoPaterno"  name="apellidoPaterno" placeholder="Introduzca su Apellido Paterno" required  pattern="[A-Z\s?a-z]{1,15}" title="Solo Letras. mínimo: 2. máximo: 15"/>
					    <br>
					     <label for="apellidoMaterno">Apellido Paterno</label>
					    <input  type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno"  placeholder="Introduzca su Apellido Materno" required  pattern="[A-Z\s?a-z]{1,15}" title="Solo Letras. mínimo: 2. máximo: 15"/>
					
					    <br>

						<label>Seleccione Su Edad</label>
						<select  name="edad" id="edad" required class="dropdown-item">
							<option  value="">--seleccione--</option>
							<script>
													

							select = document.getElementById("edad");
							for(i = 1; i < 100; i++){
							  option = document.createElement("option");
							  option.value = i;
							  option.text = i;
							  select.appendChild(option);
							}
							
							</script>
					
						</select>

						
						
						<br>
						<br>
						<label >Seleccione Su Genero</label>		
						

						<select   name="genero" id="genero" required class="dropdown-item">
							<option  value="">--seleccione--</option>
							<option  value="hombre">Hombre</option>
							<option  value="mujer">Mujer</option>
						</select>

					


 				<br>
			 	<label> Numero De Telefono</label>
			    <input type="text" class="form-control" id="telefono" name="telefono"  placeholder="Introduzca Su Numero Telefonico" required pattern="[0-9]{10}" title="Solo Numeros,máximo: 10" />
						    


				<br>
				<label>Fecha de la cita:</label>  
				<input value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>" type="date" class="form-control" name="fecha"  id="fecha" required >
				
				 


					<br>
					<label>Hora de la cita</label>
						<select  name="hora" id="hora" required class="dropdown-item">
								<option  value="">--seleccione--</option>
								<script>

										var intervalo=15;
										var horaEntrada=8;
										var minutos=0;
										select = document.getElementById("hora");
										
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

			  </div>
			 
			 <br>
			 <br>
	
			 <div >
			 	
				<a href="PaginaPrincipalCitas.html" class="btn btn-primary" role="button" >Regresar</a>
			  	<button type="submit" class="btn btn-primary">Registrar</button>

			 </div>
			 
			</form>


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