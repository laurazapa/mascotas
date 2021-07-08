<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Contacto</title>
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
			<h2>Contacta con nosotros</h2>
    		<form method= "post" action="/contacto/send" id="contacto">
    			<label>Email</label>
    			<input type="text" name= "email" required><br>
    			<label>Nombre</label>
    			<input type="text" name= "nombre" required><br>
    			<label>Asunto</label>
    			<input type="text" name= "asunto" required><br>
    			<label>Mensaje</label>
    			<textarea name= "mensaje" required placeholder="Escriba aquí su consulta"></textarea>
    			<br>
    			<input type= "submit" name= "enviar" value="Enviar" disabled>
    		</form>		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
						
	</body>
</html>