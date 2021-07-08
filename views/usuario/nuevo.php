<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Nuevo usuario</title>
		<link rel="shortcut icon" type="image/png" href="<?=FAVICON?>">
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
		<script src= "<?=JS_FILE?>"></script>
	</head>
	<body>
		<!-- Imagen flotante para volver al portfolio-->
		<div id="portfolio">
			<a href= "http://portfoliolaura.getenjoyment.net/"><img src="<?=PORTFOLIO?>" alt="Volver al portfolio" title="Volver al portfolio"></a>
		</div>
		<!-- Fin de la imagen flotante -->
		
		<?php 
		  (TEMPLATE)::header();
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();		  
		?>
		<main>
			<h2>Nuevo usuario</h2>
				
    		<form method="post" action="/usuario/store" autocomplete= "off">
    			<label>Usuario</label>
    			<input type="text" name="user" required><br>
    			<label>Password</label>
    			<input type="password" name="pass" required><br>
    			<label>Nombre</label>
    			<input type="text" name="nombre" class="mayusculas" required><br>
    			<label>Apellidos</label>
    			<input type="text" name="apellidos" class="mayusculas" required><br>
    			<label>DNI</label>
    			<input type="text" name="dni" id="inDNI" placeholder="12345678Z" required><br>    			
    			<label>Email</label>
    			<input type="email" name="email" required><br>
    			<label>Dirección</label>
    			<input type="text" name="direccion" required><br>
    			<label>Población</label>
    			<input type="text" name="poblacion" required><br>
    			<label>Provincia</label>
    			<input type="text" name="provincia" required><br>
    			<label>CP</label>
    			<input type="text" name="cp" required><br>
    		
    			<input type="submit" name="guardar" value="Guardar" id="botonEnviar">
    		</form>
    		
    		<a href="/usuario/list">Volver a la lista de usuarios</a>
		
		</main>

		<?php 
		  (TEMPLATE)::footer();
		?>			
		
	</body>
</html>