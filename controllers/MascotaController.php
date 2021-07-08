<?php
// CONTROLADOR MascotaController
class MascotaController{
    
    //operación por defecto
    public function index(){
        $this->list(); //redirige a la lisa de mascotas
    }
    
    //método para listar todas las mascotas
    public function list(){
        //recuperar la lista de mascotas
        $mascotas= Mascota::get();
        
        //cargar la vista que muestra el listado
        include 'views/mascota/lista.php';
    }
    
    //método para mostrar los detalles de una mascota
    public function show(int $id=0){
        //comprobar que recibimos el id de la mascota por parámetro
        if(!$id)
            throw new Exception("No se indicó la mascota");
        
        //recuperar la mascota con dicho código
        $mascota= Mascota::getById($id);
        
        //recuperar la raza
        $raza= Raza::getById($mascota->idraza);
        
        //comprobamos que la mascota se haya recuperado correctamente de la BDD
        if(!$mascota)
            throw new Exception("No se ha encontrado la mascota $id");
        
        //recuperamos las fotos de la mascota
        $fotos= $mascota->getFotos();
        
        //cargar la vista de detalles
        include 'views/mascota/detalles.php';
    }
    
    //GUARDAR SE HACE EN DOS PASOS
    //PASO 1: muestra el formulario de nueva mascota
    public function create(int $idusuario=0){
        
        //recupera el usuario
        $usuario= Usuario::getById($idusuario);
        
        //si no hay mascota
        if(!$usuario)
            throw new Exception("No se encontró el usuario");
        
        //recuperar las razas
        $razas = Raza::get();
        
        include 'views/mascota/nuevo.php';
    }
    
    //PASO 2: guardar mascota en la bdd con los datos que llegan del formulario
    public function store(){
        //comprueba que llegur el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
        
        //recuperar al usuario
        $id= intval($_POST['idusuario']);
        $usuario= Usuario::getById($id);
            
        $mascota= new Mascota();
        //guardar la info del formulario
        
        //id, nombre, sexo, biografia, nacimiento, fallecimiento, user, idraza
        $mascota->nombre= $_POST['nombre'];
        $mascota->sexo= $_POST['sexo'];
        $mascota->biografia= $_POST['biografia'];
        $mascota->nacimiento= $_POST['nacimiento'];
        $mascota->fallecimiento= $_POST['fallecimiento'];
        $mascota->user= $usuario->user;
        $mascota->idraza= intval($_POST['idraza']);
        $mascota->iduser= $usuario->id;
        
        if(!$mascota->guardar()) //guarda la mascota en la bdd
            throw new Exception("No se pudo guardar $mascota->nombre");
        
        //preparar un mensaje global
        $GLOBALS['mensaje']= "Guardado de la mascota $mascota->nombre correcto.";
        
        //lleva a la vista de detalles del usuario
        (new UsuarioController())->show($usuario->id); 
    }
    
    //ACTUALIZAR SE HACE EN DOS PASOS
    //PASO 1: muestra el formulario de edición de una mascota
    public function edit(int $id=0){
        // comprueba que llega el id de la mascota
        if(!$id)
            throw new Exception("No se indicó la mascota");
        
        //recupera la mascota con dicho identificador
        $mascota= Mascota::getById($id);
        
        //recuperar las razas
        $razas = Raza::get();
        
        //comprueba que la mascota se pudo recuperar de la bdd
        if(!$mascota)
            throw new Exception("No existe la mascota $id");
        
        //carga la vista del formulario
        include "views/mascota/actualizar.php";
    }
    
    //PASO 2: aplicar los cambios a la bdd
    public function update(){
        
        //comprueba que llegue el formulario con los datos
        if(empty($_POST['actualizar']))
            throw new Exception("No llegaron los datos");
        
        //podemos crear una nueva mascota o recuperar de la bdd,
        //crearé una nueva porque me ahorro una consulta
        $mascota= new Mascota();
        
        $mascota->id= intval($_POST['id']);
        $mascota->nombre= $_POST['nombre'];
        $mascota->sexo= $_POST['sexo'];
        $mascota->biografia= $_POST['biografia'];
        $mascota->nacimiento= $_POST['nacimiento'];
        $mascota->fallecimiento= $_POST['fallecimiento'];
        $mascota->user= $_POST['user'];
        $mascota->idraza= intval($_POST['idraza']);
        $mascota->iduser= intval($_POST['iduser']);
        
        //intenta realizar la actualización de datos
        if($mascota->actualizar()===false)
            throw new Exception("No se pudo actualizar $mascota->nombre");

        //prepara un mensaje. Es guarda en una variable global perque les variables no es recorden
        // despres d'executar les funcions! I ara no anem a la vista, sino que portem a un altre
        //métode!!
        $GLOBALS['mensaje']= "Actualización de la mascota $mascota->nombre correcta.";
        
        //repite la operación de edit, así mantendrá al usuario en la vista de edición
        $this->edit($mascota->id);
    }
    
    //ELIMINAR SE HACE EN DOS PASOS
    //(para poner formulario de confirmación)
    
    //PASO 1: mostrar el formulario de confirmación de eliminación
    public function delete(int $id=0){
        
        //comprobar que llega el id
        if(!$id)
            throw new Exception("No se indicó la mascota a borrar.");
        
        //recupera la mascota con dicho id
        $mascota= Mascota::getById($id);
        
        //comprueba que existe
        if(!$mascota)
            throw new Exception("No existe la mascota $id.");
        
        //cargar la vista de confirmación
        include 'views/mascota/borrar.php';
    }
    
    //PASO 2: elminar la mascota
    public function destroy(){
        
        //comprueba que llega el formulario de confirmación
        if(empty($_POST['borrar']))
            throw new Exception("No se recibió confirmación");
        
        //recupera el identificador via POST
        $id= intval($_POST['id']);
        
        //recuperar el nombre de la mascota
        $nombre= Mascota::getById($id)->nombre;
        $idusuario= Mascota::getById($id)->iduser;
        
        //intenta borrar la mascota de la BDD
        if(Mascota::borrar($id)===false)
            throw new Exception('No se pudo borrar');
        
        //preparar un mensaje global
        $GLOBALS['mensaje']= "Borrado de la mascota <b>$nombre</b> correcto.";
        
        //lleva a la vista de detalles del usuario
        (new UsuarioController())->show($idusuario);
    }
    
    
    //Método para buscar
    public function buscar(){
        
        if(empty($_POST['buscar'])){ //si no llega el formulario
            $this->list(); //redirige a la lista de mascotas
            return;
        }
        
        //toma los valores que llegan del formulario de busqueda
        $campo= $_POST['campo'];
        $valor= $_POST['valor'];
        $orden= $_POST['orden'];
        $sentido= empty($_POST['sentido'])? 'ASC' : $_POST['sentido'];
        
        //recupera las mascotas con el filtro
        $mascotas= Mascota::getFiltered($campo, $valor, $orden, $sentido);
        
        //carga la vista del listado de fotos
        require_once 'views/mascota/lista.php';
    }
    
    
}