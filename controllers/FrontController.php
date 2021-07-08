<?php
//CONTROLADOR FRONTAL
class FrontController{
    
    //método principal del controlador frontal
    public static function main(){
        try{
            //GESTIÓN DE PETICIONES
            
            //recuperar el controlador de la petición
            //si no llega el parámetro c, el controlador es Welcome
            //si llega c=usuario, el controlador es UsuarioController
            $c= empty($_GET['c'])?
            DEFAULT_CONTROLLER : ucfirst($_GET['c']).'Controller';
            
            //recuperar el método de la petición
            //si no llega el parámetro m, el método es index
            //si llega m=create, el método es create()
            $m= empty($_GET['m'])?
            DEFAULT_METHOD : $_GET['m'];
            
            //recuperar el parámetro de la petición
            $p = empty($_GET['p'])? false: $_GET['p'];
            
            //cargar el controlador correspondiente
            $controlador= new $c();
            
            //comprobar si existe el método
            if(!is_callable([$controlador, $m]))
                throw new Exception("No existe la operación $m");
                
                //llama al método del controlador, pasando el parámetro
                $controlador->$m($p);
                
                //si se produce algun error...
        }catch(Throwable $e){
            $mensaje= $e->getMessage(); //recupera el mensaje del error
            include 'views/error.php'; //carga la vista de error
        }
    }
    
}