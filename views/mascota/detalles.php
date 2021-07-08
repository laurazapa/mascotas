<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Detalles mascota</title>
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
			<h2>Detalles de la mascota</h2>
    		<h3><?=$mascota->nombre?></h3>
    		
    		<?=empty($GLOBALS['mensaje'])? "":"<p class='exito'>".$GLOBALS['mensaje']."</p>"?>		
    		
    		<div id="detalles">
    			<p><b>Nombre:</b> <?=$mascota->nombre?></p>
        		<p><b>Sexo:</b> <?=$mascota->sexo?></p>
        		<p><b>Biografia:</b> <?=$mascota->biografia?></p>
        		<p><b>Fecha de nacimiento:</b> <?=$mascota->nacimiento?></p>
        		<p><b>Fecha de fallecimiento:</b> <?=$mascota->fallecimiento?></p>
        		<p><b>Usuario:</b> <a href="/usuario/show/<?=$mascota->iduser?>"><?=$mascota->user?></a></p>
        		<p><b>Raza:</b> <?=$raza->nombre?></p>
        		
        		<h4>Fotos de <?=$mascota->nombre?></h4>
        		
        		<?php
        		echo "<a href='/foto/create/$mascota->id'><img  class='icon' src='/imagenes/template/add.png' alt='Añadir'> Añadir foto</a>";
        		if(sizeof($fotos)){
        		    echo "<div class= 'galeria flex-container'>";
        		    foreach($fotos as $foto){
        		        echo "<figure class='flex1'>";
        		        echo $foto->fichero?
            		        "<img src='/$foto->fichero' alt='$mascota->nombre'>" :
            		        "<img src='/imagenes/mascotas/default.png' alt='$mascota->nombre'>";
        		        echo "<figcaption>$foto->ubicacion <a href='/foto/delete/$foto->id'><img  class='icon' src='/imagenes/template/delete.png' alt='Borrar'></a></figcaption>";
        		        echo "</figure>";
        		    }
        		    echo "</div>";	
        		}else{
        		    echo "<p>No tiene fotos<p>";
        		}			
        		?>
    		</div>
    		
    		<div id="acciones">
    			<a href="/mascota/edit/<?=$mascota->id?>"><img  class='iconBig' src='/imagenes/template/update.png' alt='Editar' title="Editar mascota"></a>
    			<a href="/mascota/delete/<?=$mascota->id?>"><img  class='iconBig' src='/imagenes/template/delete.png' alt='Borrar' title="Borrar mascota"></a>
    		</div>
    		 
    		<a href="/mascota/list">Volver a la lista de mascotas</a>
    		
		</main>		
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
		
	</body>
</html>
