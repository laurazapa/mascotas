<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Lista mascotas</title>
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
			<h2>Lista de mascotas</h2>
		
    		<!-- Formulario de búsqueda -->
    		<form class="formfiltro" action="/mascota/buscar" method="post" autocomplete="off">
        		<div>
        			<div>
            			<label>Campo:</label>
            			<select name="campo">
            				<option value="nombre"
            				<?=!empty($campo) && $campo=='"nombre"'? ' selected': ''; ?>
            				>Nombre</option>
            				<option value="sexo"
            				<?=!empty($campo) && $campo=='sexo'? ' selected': ''; ?>
            				>Sexo</option>
            				<option value="nacimiento"
            				<?=!empty($campo) && $campo=='nacimiento'? ' selected': ''; ?>
            				>Fecha nacimiento</option>
            			</select>
            			
            			<label>Valor:</label>
            			<input type="text" name="valor" value="<?=!empty($valor)? $valor:'';?>">
            			
            			<label>Orden:</label>
            			<select name="orden">
            				<option value="nombre"
            				<?=!empty($orden) && $orden=='nombre'? ' selected': ''; ?>
            				>Nombre</option>
            				<option value="sexo"
            				<?=!empty($orden) && $orden=='sexo'? ' selected': ''; ?>
            				>Sexo</option>
            				<option value="nacimiento"
            				<?=!empty($orden) && $orden=='nacimiento'? ' selected': ''; ?>
            				>Fecha nacimiento</option>
            			</select>
        			</div>
        			
        			<div>
            			<input type="radio" name="sentido" value="ASC"
            			<?=empty($sentido) || $sentido=='ASC'? ' checked':'';?>>
            			<label>Ascendente</label>
            			<input type="radio" name="sentido" value="DESC"
            			<?=!empty($sentido) && $sentido=='DESC'? ' checked':'';?>>
            			<label>Descendente</label>
        			</div>
        			
        			<div>
        				<input type="submit" name="buscar" value="Buscar">    			
        			</div>
        		</div>
    			
    			
    		</form>
    		
    		<div>
    			<a href="/foto/list">Quitar filtros</a>
    		</div>
    		
    		
    		<table class="tablalistado" border= "1">
    			<tr>
    				<th>Nombre</th>
    				<th>Sexo</th>
    				<th>Fecha nacimiento</th>
    				<th>Operaciones</th>
    			</tr>
    			
    			<?php 
    			foreach($mascotas as $mascota){
    			    echo "<tr>";
    			    echo "<td>$mascota->nombre</td>";
    			    echo "<td>$mascota->sexo</td>";
    			    echo "<td>$mascota->nacimiento</td>";
    			    echo "<td>";
    			    echo " <a href= '/mascota/show/$mascota->id'><img  class='icon' src='/imagenes/template/show.png' alt='Ver'></a>";
    			    echo " <a href= '/mascota/edit/$mascota->id'><img  class='icon' src='/imagenes/template/update.png' alt='Actualizar'></a>";
    			    echo " <a href= '/mascota/delete/$mascota->id'><img  class='icon' src='/imagenes/template/delete.png' alt='Borrar'></a>";
    			    echo "</td>";
    			    echo "</tr>";
    			}
    			?>			
    		</table>
    		
    		<a href="/mascota/list">Volver a la lista de mascotas</a>
		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
		
			
	</body>
</html>