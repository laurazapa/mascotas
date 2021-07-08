<?php
//CONTROLADOR UsuarioController
class UsuarioController{
   
    //operación por defecto
    public function index(){
        $this->list(); //redirige a la lisa de usuarios
    }
    
    //método para listar todos los usuarios
    public function list(){
        //recuperar la lista de usuarios
        $usuarios= Usuario::get();
        
        //cargar la vista que muestra el listado
        include 'views/usuario/lista.php';
    }
    
    //método para mostrar los detalles de un usuario
    public function show(int $id=0){
        //comprobar que recibimos el id del usuario por parámetro
        if(!$id)
            throw new Exception("No se indicó el usuario");
            
        //recuperar el usuario con dicho código
        $usuario= Usuario::getById($id);
        
        //comprobamos que la mascota se haya recuperado correctamente de la BDD
        if(!$usuario)
            throw new Exception("No se ha encontrado el usuario $id");
        
        //recuperar las mascotas de un usuario
        $mascotas= $usuario->getMascotas();
        
        //recuperar las fotos del usuario
        $fotos= $usuario->getFotos();
            
        //cargar la vista de detalles
        include 'views/usuario/detalles.php';
    }
    
    //GUARDAR SE HACE EN DOS PASOS
    //PASO 1: muestra el formulario de nuevo usuario
    public function create(){
        include 'views/usuario/nuevo.php';
    }
    
    //PASO 2: guardar usuario en la bdd con los datos que llegan del formulario
    public function store(){
        //comprueba que llegur el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
        $usuario= new Usuario();
        //guardar la info del formulario
        
        //user, pass, nombre, apellidos, email, direccion, poblacion, provincia, cp
        $usuario->user= $_POST['user'];
        $usuario->pass= $_POST['pass'];
        $usuario->nombre= $_POST['nombre'];
        $usuario->apellidos= $_POST['apellidos'];
        $usuario->email= $_POST['email'];
        $usuario->direccion= $_POST['direccion'];
        $usuario->poblacion= $_POST['poblacion'];
        $usuario->provincia= $_POST['provincia'];
        $usuario->cp= $_POST['cp'];
        
        if(!$usuario->guardar()) //guarda el usuario en la bdd
            throw new Exception("No se pudo guardar $usuario->nombre");
        
        // preparar un mensaje global
        $GLOBALS['mensaje']= "Guardado del usuario $usuario->user correcto.";
        
        //llevar a los detalles del usuario
        $this->show($usuario->id);        
    }
    
    //ACTUALIZAR SE HACE EN DOS PASOS
    //PASO 1: muestra el formulario de edición
    public function edit(int $id=0){
        // comprueba que llega el id
        if(!$id)
            throw new Exception("No se indicó el usuario");
            
        //recupera el usuario con dicho identificador
        $usuario= Usuario::getById($id);
        
        //comprueba que la mascota se pudo recuperar de la bdd
        if(!$usuario)
            throw new Exception("No existe el usuario $id");
            
        //carga la vista del formulario
        include "views/usuario/actualizar.php";
    }
    
    //PASO 2: aplicar los cambios a la bdd
    public function update(){
        
        //comprueba que llegue el formulario con los datos
        if(empty($_POST['actualizar']))
            throw new Exception("No llegaron los datos");
            
        //podemos crear un nuevo usuario o recuperar de la bdd,
        //crearé un nuevo usuario porque me ahorro una consulta
        $usuario= new Usuario();
        
        $usuario->id= intval($_POST['id']);
        $usuario->user= $_POST['user'];
        $usuario->pass= $_POST['pass'];
        $usuario->nombre= $_POST['nombre'];
        $usuario->apellidos= $_POST['apellidos'];
        $usuario->email= $_POST['email'];
        $usuario->direccion= $_POST['direccion'];
        $usuario->poblacion= $_POST['poblacion'];
        $usuario->provincia= $_POST['provincia'];
        $usuario->cp= $_POST['cp'];
        
        //intenta realizar la actualización de datos
        if($usuario->actualizar()===false)
            throw new Exception("No se pudo actualizar $usuario->user");
            
        //prepara un mensaje. Es guarda en una variable global perque les variables no es recorden
        // despres d'executar les funcions! I ara no anem a la vista, sino que portem a un altre
        //métode!!
        $GLOBALS['mensaje']= "Actualización del usuario $usuario->user correcta.";
        
        //repite la operación de edit, así mantendrá al usuario en la vista de edición
        $this->edit($usuario->id);
    }
    
    //ELIMINAR SE HACE EN DOS PASOS
    //(para poner formulario de confirmación)
    
    //PASO 1: mostrar el formulario de confirmación de eliminación
    public function delete(int $id=0){
        
        //comprobar que llega el id
        if(!$id)
            throw new Exception("No se indicó el usuario a borrar.");
            
        //recupera el usuario con dicho id
        $usuario= Usuario::getById($id);
        
        //comprueba que existe
        if(!$usuario)
            throw new Exception("No existe el usuario $id.");
            
        //cargar la vista de confirmación
        include 'views/usuario/borrar.php';
    }
    
    //PASO 2: elminar el usuario
    public function destroy(){
        
        //comprueba que llega el formulario de confirmación
        if(empty($_POST['borrar']))
            throw new Exception("No se recibió confirmación");
            
        //recupera el identificador via POST
        $id= intval($_POST['id']);
        
        //intenta borrar el usuario de la BDD
        if(Usuario::borrar($id)===false)
            throw new Exception('No se pudo borrar');
            
        //muestra la vista de éxito
        $mensaje= "Borrado del usuario $id correcto.";
        include 'views/exito.php';
    }
    
    //Método para buscar
    public function buscar(){
        
        if(empty($_POST['buscar'])){ //si no llega el formulario
            $this->list(); //redirige a la lista de usuarios
            return;
        }
        
        //toma los valores que llegan del formulario de busqueda
        $campo= $_POST['campo'];
        $valor= $_POST['valor'];
        $orden= $_POST['orden'];
        $sentido= empty($_POST['sentido'])? 'ASC' : $_POST['sentido'];
        
        //recupera los usuarios con el filtro
        $usuarios= Usuario::getFiltered($campo, $valor, $orden, $sentido);
        
        //carga la vista del listado de fotos
        require_once 'views/usuario/lista.php';
    }
    
    
}
