<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Borrar usuario</title>
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
			<h2>Confirmar borrado</h2>
		
    		<form method="post" action= "/usuario/destroy">
    			<p>Confirmar el borrado del usuario <?=$usuario->user?>.</p>
    			<input type="hidden" name="id" value="<?=$id?>">
    			
    			<input type= "submit" name="borrar" value="Borrar" id="danger">		
    		</form>
    		
    		<a href="/usuario/show/<?=$id?>">Detalles</a> - 
    		<a href="/usuario/list">Volver a la lista de usuarios</a>
		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
		
	</body>
</html>
