<?php
// FotoController
class FotoController{
    
    //operación por defecto
    public function index(){
        $this->list(); //redirige a la lisa de fotos
    }    
    
    //método para listar todas las fotos
    public function list(){
        //recuperar la lista de fotos
        $fotos= Foto::get();
        
        //cargar la vista que muestra el listado
        include 'views/foto/lista.php';
    }
    
    //GUARDAR SE HACE EN DOS PASOS
    //PASO 1: muestra el formulario de nuevo
    public function create(int $idmascota=0){
        
        //recupera la mascota
        $mascota= Mascota::getById($idmascota);
        
        //si no hay mascota
        if(!$mascota)
            throw new Exception("No se encontró la mascota");
        
        include 'views/foto/nuevo.php';
    }
    
    //PASO 2: guardar foto en la bdd con los datos que llegan del formulario
    public function store(){
        //comprueba que llegur el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
        $foto= new Foto();
        //guardar la info del formulario
        
        $foto->ubicacion= $_POST['ubicacion'];
        $foto->idmascota= intval($_POST['idmascota']);
        
        //tratamiento de la imagen
        $u= new Upload();
        
        
        //if($u->llegaFichero('fichero')) //si llega el fichero
        //    $foto->fichero= $u->procesar('fichero', 'imagenes/mascotas', true, 0, 'image/*');
        
        if($u->llegaFichero('fichero')) //si llega el fichero
            $foto->fichero= $u->procesar('fichero', 'imagenes/mascotas', true, 0, 'image/*');
        
        
        if(!$foto->guardar()){ //guarda la foto en la bdd
            @unlink($foto->fichero); //si falla el guardado, eliminar la foto
            throw new Exception("No se pudo guardar $foto->fichero");
        }
        
        //crear un mensaje para mostrar que funcionó
        $GLOBALS['mensaje']= "Foto añadida correctamente.";
            
        //recuperar la mascota para mostrar sus detalles al terminar
        (new MascotaController())->show($foto->idmascota);
    }
    
    //ELIMINAR SE HACE EN DOS PASOS
    //(para poner formulario de confirmación)
    
    //PASO 1: mostrar el formulario de confirmación de eliminación
    public function delete(int $id=0){
        
        //comprobar que llega el id
        if(!$id)
            throw new Exception("No se indicó la foto a borrar.");
            
        //recupera la foto con dicho id
        $foto= Foto::getById($id);
        
        //comprueba que existe
        if(!$foto)
            throw new Exception("No existe la foto $id.");
            
        //cargar la vista de confirmación
        include 'views/foto/borrar.php';
    }
    
    //PASO 2: elminar la mascota
    public function destroy(){
        
        //comprueba que llega el formulario de confirmación
        if(empty($_POST['borrar']))
            throw new Exception("No se recibió confirmación");
            
        //recupera el identificador via POST
        $id= intval($_POST['id']);
        $idmascota= intval($_POST['idmascota']);
        
        //recupera la foto con dicho id
        $foto= Foto::getById($id);
        
        //intenta borrar la foto de la BDD
        if(Foto::borrar($id)===false)
            throw new Exception('No se pudo borrar');
        
        @unlink($foto->fichero);
            
        //crear un mensaje para mostrar que funcionó
        $GLOBALS['mensaje']= "Borrado de la foto correcto.";
        
        (new MascotaController())->show($idmascota);
    }
    
    //Método para buscar
    public function buscar(){
        
        if(empty($_POST['buscar'])){ //si no llega el formulario
            $this->list(); //redirige a la lista de fotos
            return;
        }
        
        //toma los valores que llegan del formulario de busqueda
        $campo= $_POST['campo'];
        $valor= $_POST['valor'];
        $orden= $_POST['orden'];
        $sentido= empty($_POST['sentido'])? 'ASC' : $_POST['sentido'];
        
        //recupera las fotos con el filtro
        $fotos= Foto::getFiltered($campo, $valor, $orden, $sentido);
        
        //carga la vista del listado de fotos
        require_once 'views/foto/lista.php';        
    }
    
    
}