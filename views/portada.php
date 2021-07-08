<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset="UTF-8">
		<title>Mascotas</title>
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
			<h2>Bienvenido a nuestra web de mascotas</h2>
						
			<div id="slider" class="galeria flex-container">
				<div class='boton' >
					<img src="/imagenes/template/previous.png" onclick="retroceder()" alt="anterior">
				</div>
    			<figure>
    				<img id="foto" alt="imagen" src="/imagenes/template/imagenPortada.jpeg">
    			</figure>
    			<div class='boton' >
    				<img src="/imagenes/template/next.png" onclick='avanzar()' alt="siguiente">
    			</div>
    			
    			
    			<?php
    			$fotos= Foto::get();
    			$fotos= array_slice($fotos, 0, 20);//seleccionar solo las 20 imagenes que hay
    			shuffle($fotos); //mezclarlas
    			$fotos= array_slice($fotos, 0, 5); //sacar las 5 primeras (seran aleatorias por el shuffle)
    			$archivos=[]; //crear un array vacío para guardar la ruta de las imágenes
    			
    			foreach($fotos as $foto){
    			    $archivos[]= $foto->fichero;    			    
    			}		
                ?>
                          
                <script>
                    var fotos =  <?php echo json_encode($archivos); ?>;
        
                    var i=0;
        			function retroceder(){
        				clearTimeout(t);
        				i= i>0? i-1 : fotos.length-1;
        				foto.src= '/'+fotos[i];	
        				t= setTimeout(avanzar, 5000);
        			}
        			
        			function avanzar(){
        				clearTimeout(t);
        				i=(i+1)%fotos.length;
        				foto.src='/'+fotos[i];
        				t=setTimeout(avanzar, 5000);
        			}
        
        			var t= setTimeout(avanzar, 5000);                         
                </script>
			
			</div>
			
			
			<div>
				<ul id= "atajos">
					<li><img src="imagenes/template/keyU.png" alt="U"> Lista de usuarios</li>
					<li><img src="imagenes/template/keyM.png" alt="M"> Lista de mascotas</li>
					<li><img src="imagenes/template/keyG.png" alt="G"> Galería de fotos</li>
					<li><img src="imagenes/template/keyQ.png" alt="Q"> Contacto</li>				
				</ul>
			</div>
		</main>
		
		<?php 
		  (TEMPLATE)::footer();
		?>			
	</body>
</html>