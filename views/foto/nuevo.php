<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Nueva foto</title>
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
			<h2>Nueva foto de <?=$mascota->nombre?></h2>
		
    		<form method="post" action="/foto/store" autocomplete= "off" enctype="multipart/form-data">
    			<input type= "hidden" name="idmascota" value="<?=$mascota->id?>">
    			<label>Fichero</label>
    			<input type="file" name="fichero" required><br>
    			<label>Ubicación</label>
    			<input type="text" name="ubicacion"><br>
    		
    			<input type="submit" name="guardar" value="Guardar">
    		</form>
    		
    		<a href="/mascota/show/<?=$mascota->id?>">Volver a los detalles de <?=$mascota->nombre?></a>
    		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
		
	</body>
</html>