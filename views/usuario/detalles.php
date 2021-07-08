<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Detalles usuario</title>
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
			<h2>Detalles del usuario</h2>
			
			<?=empty($GLOBALS['mensaje'])? "":"<p class='exito'>".$GLOBALS['mensaje']."</p>"?>
			
    		<h3><?=$usuario->user?></h3>
    		
    		
    		<div id="detalles">
    			<p><b>User:</b> <?=$usuario->user?></p>
        		<p><b>Nombre:</b> <?=$usuario->nombre?></p>
        		<p><b>Apellidos:</b> <?=$usuario->apellidos?></p>
        		<p><b>Email:</b> <?=$usuario->email?></p>
        		<p><b>Dirección:</b> <?=$usuario->direccion?></p>
        		<p><b>Población:</b> <?=$usuario->poblacion?></p>
        		<p><b>Província:</b> <?=$usuario->provincia?></p>
        		<p><b>CP:</b> <?=$usuario->cp?></p>
        		
        		<h4>Mascotas de <?=$usuario->user?></h4>
        		<?php 
        		echo "<a href='/mascota/create/$usuario->id'><img  class='icon' src='/imagenes/template/add.png' alt='Añadir'> Añadir mascota</a>";
        		echo "<br>";
        		if(sizeof($mascotas)){
        		    echo "<ul>";
        		    foreach($mascotas as $mascota){
        		        echo "<li>";
        		        echo "$mascota->nombre - <a href= '/mascota/show/$mascota->id'><img class='icon' src='/imagenes/template/show.png' alt='Ver'></a>  ";
        		        echo "<a href= '/mascota/edit/$mascota->id'><img  class='icon' src='/imagenes/template/update.png' alt='Editar'></a>  ";
        		        echo "<a href= '/mascota/delete/$mascota->id'><img  class='icon' src='/imagenes/template/delete.png' alt='Borrar'></a> - ";
        		        echo "<a href='/foto/create/$mascota->id'>Añadir una foto de $mascota->nombre</a>";
        		        echo "</li>";
        		    }
        		    echo "</ul>";	
        		}else{
        		    echo "No tiene mascotas.";
        		}			
        		?>
        		
        		<h4>Fotos de <?=$usuario->user?></h4>
        		
        		<?php
        		if(sizeof($fotos)){
        		    echo "<div class= 'galeria flex-container'>";
        		    foreach($fotos as $foto){
        		        echo "<figure class='flex1'>";
        		        echo $foto->fichero?
            		        "<img src='/$foto->fichero' alt='$foto->nombre'>" :
            		        "<img src='/imagenes/mascotas/default.png' alt='$foto->nombre'>";
        		        echo "<figcaption>$foto->nombre ($foto->ubicacion)</figcaption><a href='/foto/delete/$foto->id'><img  class='icon' src='/imagenes/template/delete.png' alt='Borrar'></a></figcaption>";
         		        echo "</figure>";
        		    }
        		    echo "</div>";
        		}else{
        		    echo "No tiene fotos.";
        		}				
        		?>
    		</div>
    		
    		<div id="acciones">
    			<a href="/usuario/edit/<?=$usuario->id?>"><img  class='iconBig' src='/imagenes/template/update.png' alt='Editar' title="Editar usuario"></a>
    			<a href="/usuario/delete/<?=$usuario->id?>"><img  class='iconBig' src='/imagenes/template/delete.png' alt='Borrar' title="Borrar usuario"></a>
    		</div>
    		 
    		<a href="/usuario/list">Volver a la lista de usuarios</a>
    				
		</main>

		<?php 
		  (TEMPLATE)::footer();
		?>			
		
	</body>
</html>
