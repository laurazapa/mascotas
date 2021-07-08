<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Galería de fotos</title>
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
			<h2>Galería de fotos de mascotas</h2>
		
    		<!-- Formulario de búsqueda -->
    		<form class="formfiltro" action="/foto/buscar" method="post" autocomplete="off">
    			<label>Campo:</label>
    			<select name="campo">
    				<option value="raza"
    				<?=!empty($campo) && $campo=='raza'? ' selected': ''; ?>
    				>Raza</option>
    				<option value="tipo"
    				<?=!empty($campo) && $campo=='tipo'? ' selected': ''; ?>
    				>Tipo</option>
    				<option value="nombre"
    				<?=!empty($campo) && $campo=='nombre'? ' selected': ''; ?>
    				>Nombre</option>
    			</select>
    			
    			<label>Valor:</label>
    			<input type="text" name="valor" value="<?=!empty($valor)? $valor:'';?>">
    			
    			<label>Orden:</label>
    			<select name="orden">
    				<option value="raza"
    				<?=!empty($orden) && $orden=='raza'? ' selected': ''; ?>
    				>Raza</option>
    				<option value="tipo"
    				<?=!empty($orden) && $orden=='tipo'? ' selected': ''; ?>
    				>Tipo</option>
    				<option value="nombre"
    				<?=!empty($orden) && $orden=='nombre'? ' selected': ''; ?>
    				>Nombre</option>
    			</select>
    			
    			<input type="radio" name="sentido" value="ASC"
    			<?=empty($sentido) || $sentido=='ASC'? ' checked':'';?>>
    			<label>Ascendente</label>
    			<input type="radio" name="sentido" value="DESC"
    			<?=!empty($sentido) && $sentido=='DESC'? ' checked':'';?>>
    			<label>Descendente</label>
    			
    			<input type="submit" name="buscar" value="Buscar">
    		</form>
    		<div>
    			<a href="/foto/list">Quitar filtros</a>
    		</div>
    		
    		<div id="galeria" class= "galeria flex-container">
    		<?php 
    		foreach($fotos as $foto){
    		    echo "<figure class='flex1'>";
    		        echo $foto->fichero?
    		               "<img src='/$foto->fichero' alt='$foto->nombre'>" :
    		               "<img src='/imagenes/mascotas/default.png' alt='$foto->nombre'>";
        		    echo "<figcaption>$foto->nombre ($foto->tipo $foto->raza)</figcaption>";
    		    echo "</figure>";
    		}
    		?>		
    		</div>
    		
    		<a href="/mascota/list">Volver a la lista de mascotas</a>
		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
					
	</body>
</html>