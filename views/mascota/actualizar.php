<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar mascota</title>
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
    		
    		<form method="post" action="/mascota/update" autocomplete= "off" id="formMascota">
    			<input type= "hidden" name="id" value="<?=$mascota->id?>">
    			<label>Nombre</label>
    			<input type="text" name="nombre" value="<?=$mascota->nombre?>"><br>
    			<label>Sexo</label><br>
    			<input type="radio" name="sexo" value="M" <?= $mascota->sexo=='M'? 'checked':''?>>
    			<label>Macho</label><br>			
    			<input type="radio" name="sexo" value="H" <?= $mascota->sexo=='H'? 'checked':''?>>
    			<label>Hembra</label><br>			
    			<label>Biografía</label>
    			<textarea name="biografia" placeholder= "Explícanos sobre tu mascota"><?=$mascota->biografia?></textarea><br>
    			<label>Nacimiento</label>
    			<input type="date" name="nacimiento" value="<?=$mascota->nacimiento?>"><br>
    			<label>Fallecimiento</label>
    			<input type="date" name="fallecimiento" value="<?=$mascota->fallecimiento?>"><br>
    			
    			<input type="hidden" name="user" value="<?=$mascota->user?>"><br>
    			<label>Raza</label>
    			<?php 
    			// FER UN DESPLEGABLE AMB SELECTS PER LA RAZA
    			// 
    			echo "<select name='idraza'>";
    			foreach($razas as $raza){
    			    echo "<option value=$raza->id ";
    			    echo ($mascota->idraza == $raza->id)? 'selected':'';
                    echo ">";
    			    echo "$raza->nombre";
    			    echo "</option>";
    			}
    			echo "</select>";
    			?>
    			<br>
    			<input type="hidden" name="iduser" step="1" value="<?=$mascota->iduser?>"><br>
    			
    			<?php 
    			// FER UN DESPLEGABLE AMB SELECTS PER LA RAZA
    			?>
    		
    			<input type="submit" name="actualizar" value="Actualizar">
    		</form>
    		
    		<a href="/mascota/show/<?=$mascota->id?>">Detalles</a> - 
    		<a href="/mascota/list">Volver a la lista de mascotas</a>
		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
		
	</body>
</html>
