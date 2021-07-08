<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Lista usuarios</title>
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
			<h2>Lista de usuarios</h2>
			   		
    		<!-- Formulario de búsqueda -->
    		<form class="formfiltro" action="/usuario/buscar" method="post" autocomplete="off">
    			<label>Campo:</label>
    			<select name="campo">
    				<option value="nombre"
    				<?=!empty($campo) && $campo=='nombre'? ' selected': ''; ?>
    				>Nombre</option>
    				<option value="apellidos"
    				<?=!empty($campo) && $campo=='apellidos'? ' selected': ''; ?>
    				>Apellidos</option>
    				<option value="user"
    				<?=!empty($campo) && $campo=='user'? ' selected': ''; ?>
    				>User</option>
    			</select>
    			
    			<label>Valor:</label>
    			<input type="text" name="valor" value="<?=!empty($valor)? $valor:'';?>">
    			
    			<label>Orden:</label>
    			<select name="orden">
    				<option value="nombre"
    				<?=!empty($orden) && $orden=='nombre'? ' selected': ''; ?>
    				>Nombre</option>
    				<option value="apellidos"
    				<?=!empty($orden) && $orden=='apellidos'? ' selected': ''; ?>
    				>Apellidos</option>
    				<option value="user"
    				<?=!empty($orden) && $orden=='user'? ' selected': ''; ?>
    				>User</option>
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
    		   	<a id="nofiltro" href="/usuario/list">Quitar filtros</a>
    		</div>
 
    		
    		
    		<table class="tablalistado" border= "1">
    			<tr>
    				<th>User</th>
    				<th>Nombre</th>
    				<th>Apellidos</th>
    				<th>Operaciones</th>
    			</tr>
    			
    			<?php 
    			foreach($usuarios as $usuario){
    			    echo "<tr>";
    			    echo "<td>$usuario->user</td>";
    			    echo "<td>$usuario->nombre</td>";
    			    echo "<td>$usuario->apellidos</td>";
    			    echo "<td>";
    			    echo " <a href= '/usuario/show/$usuario->id'><img  class='icon' src='/imagenes/template/show.png' alt='Ver'></a>";
    			    echo " <a href= '/usuario/edit/$usuario->id'><img  class='icon' src='/imagenes/template/update.png' alt='Actualizar'></a>";
    			    echo " <a href= '/usuario/delete/$usuario->id'><img  class='icon' src='/imagenes/template/delete.png' alt='Borrar'></a>";
    			    echo "</td>";
    			    echo "</tr>";
    			}
    			?>			
    		</table>
    		
    		<a href="/usuario/list">Volver a la lista de usuarios</a>
		
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
			
	</body>
</html>