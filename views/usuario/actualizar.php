<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar usuario</title>
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
			<h2>Formulario de edición</h2>
		
    		<?=empty($GLOBALS['mensaje'])? "":"<p class='exito'>".$GLOBALS['mensaje']."</p>"?>
    		
    		<form method="post" action="/usuario/update" autocomplete= "off">
    			<input type="hidden" name="id" value="<?=$usuario->id?>">
    			<label>Usuario</label>
    			<input type="text" name="user" value="<?=$usuario->user?>"><br>
    			<label>Password</label>
    			<input type="password" name="pass" value="<?=$usuario->pass?>"><br>
    			<label>Nombre</label>
    			<input type="text" name="nombre" value="<?=$usuario->nombre?>"><br>
    			<label>Apellidos</label>
    			<input type="text" name="apellidos" value="<?=$usuario->apellidos?>"><br>
    			<label>Email</label>
    			<input type="email" name="email" value="<?=$usuario->email?>"><br>
    			<label>Dirección</label>
    			<input type="text" name="direccion" value="<?=$usuario->direccion?>"><br>
    			<label>Población</label>
    			<input type="text" name="poblacion" value="<?=$usuario->poblacion?>"><br>
    			<label>Provincia</label>
    			<input type="text" name="provincia" value="<?=$usuario->provincia?>"><br>
    			<label>CP</label>
    			<input type="text" name="cp" value="<?=$usuario->cp?>"><br>
    		
    			<input type="submit" name="actualizar" value="Actualizar">
    		</form>
    		
    		<a href="/usuario/show/<?=$usuario->id?>">Detalles del usuario</a> - 
    		<a href="/usuario/list">Volver a la lista de usuarios</a>
		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
		
	</body>
</html>
