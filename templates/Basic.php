<?php
class Basic{
    //pon el header
    public static function header(string $pagina= ''){?>
        <header class="flex-container">
			<figure class="flex1">
				<a href="/"><img src="/imagenes/template/logo.jpg" alt="mascotas"></a>
			</figure>
			<h1 class="flex4">Mascotas</h1>
			<div class="flex1">
    			<div id= "reloj">
    				<output id="outHoras">00</output>:
        			<output id="outMinutos">00</output>:
        			<output id="outSegundos">00</output>
    			</div>
			</div>
			
		</header>
        
        <?php } 
        
    //pone el nav
    public static function nav(){?>
    	<nav id="navegacion">
    		<ul class= "flex-container">
    			<li class= "flex1"><a href="/">Inicio</a></li>
    			<li class= "flex1"><a href="/usuario">Lista de usuarios</a></li>
    			<li class= "flex1"><a href="/usuario/create">Nuevo usuario</a></li>
    			<li class= "flex1"><a href="/mascota">Lista de mascotas</a></li>
    			<li class= "flex1"><a href="/foto">Galería</a></li>
    			<li class= "flex1"><a href="/contacto">Contacto</a></li>	
    		</ul>
    	</nav>            
    <?php }
    
    //pone el login/logout
    public static function login(){
        // TODO
    }
    
    //pone el footer
    public static function footer(){?>
    	<footer>
			<details>
				<summary>Sobre la web y el autor</summary>
				<p>Web sobre mascotas y sus fotos</p>
				<p>Por Laura</p>
			</details>
		</footer>
    <?php }    
}