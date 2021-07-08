<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Nueva mascota</title>
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
			<h2>Nueva mascota</h2>
		
    		<form method="post" action="/mascota/store" autocomplete= "off" id="formMascota">
    			<input type= "hidden" name="idusuario" value="<?=$usuario->id?>">
    			<label>Nombre</label>
    			<input type="text" name="nombre"><br>
    			<label>Sexo</label><br>
    			<input type="radio" name="sexo" value="M" checked>
    			<label>Macho</label><br>			
    			<input type="radio" name="sexo" value="H">
    			<label>Hembra</label><br>			
    			<label>Biografía</label>
    			<textarea name="biografia" placeholder= "Explícanos sobre tu mascota"></textarea><br>
    			<label>Fecha de nacimiento</label>
    			<input type="date" name="nacimiento"><br>
    			<label>Fecha de fallecimiento</label>
    			<input type="date" name="fallecimiento"><br>
    			<label>Raza</label>
    			<?php 
    			// FER UN DESPLEGABLE AMB SELECTS PER LA RAZA
    			echo "<select name='idraza'>";
    			foreach($razas as $raza){
    			    echo "<option value=$raza->id>";
    			    echo "$raza->nombre";
    			    echo "</option>";
    			}
    			echo "</select>";
    			?>    			   			
    			<br>
    		
    			<input type="submit" name="guardar" value="Guardar">
    		</form>
    		
    		<a href="/mascota/list">Volver a la lista de mascotas</a>
		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
				
	</body>
</html>