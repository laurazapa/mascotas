<?php
//clase Usuario del modelo
class Usuario{
    
    //PROPIEDADES
    public $id=0, $user='', $pass='', $nombre='', $apellidos='',
            $email='', $direccion='', $poblacion='', $provincia='', $cp='';
    
    //MÉTODOS
    //método para recuperar todos los usuarios
    public static function get(){
        $consulta= "SELECT * FROM usuarios";
        return DB::selectAll($consulta, self::class);
    }
    
    //método para recuperar un usuario por su id
    public static function getById(int $id):?Usuario{
        $consulta= "SELECT * FROM usuarios WHERE id=$id";
        return DB::select($consulta, self::class);
    }
    
    //método para guardar un nuevo usuario en la BDD
    public function guardar(){
        //prepara la consulta de inserción
        $consulta= "INSERT INTO usuarios(user, pass, nombre, apellidos,
                    email, direccion, poblacion, provincia, cp)
                    VALUES('$this->user', '$this->pass',
                            '$this->nombre', '$this->apellidos', '$this->email',
                            '$this->direccion', '$this->poblacion',
                            '$this->provincia', '$this->cp')";
        //echo $consulta;
        //guarda el nuevo usuario en la BDD y actualiza el ID con el autonumerico
        // que se le ha asignado en la bdd
        $this->id = DB::insert($consulta); //ho fiquem aquí per tal que l'objecte
        // creat tingui el id!!
        
        //retorna el id del nuevo usuario (o false si falló la inserción)
        return $this->id;
    }
    
    //método que actualiza un usuario en la bdd
    public function actualizar(){
        //prepara la consulta
        $consulta= "UPDATE usuarios SET
                        user= '$this->user',
                        pass= '$this->pass',
                        nombre= '$this->nombre',
                        apellidos= '$this->apellidos',
                        email= '$this->email',
                        direccion= '$this->direccion',
                        poblacion= '$this->poblacion',
                        provincia= '$this->provincia',
                        cp= '$this->cp'
                    WHERE id= $this->id";
        //echo $consulta;
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún problema
        return DB::update($consulta);
    }
    
    //método que borra un usuario de la bdd
    public static function borrar(int $id){
        //prepara la consulta
        $consulta= "DELETE FROM usuarios WHERE id= $id";
        
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún error
        return DB::delete($consulta);
    }
    
    //método para filtrar de forma avanzada
    public static function getFiltered(string $campo= 'nombre', string $valor='',
        string $orden='id', string $sentido= 'ASC'):array{
            $consulta= "SELECT *
                    FROM usuarios
                    WHERE $campo LIKE '%$valor%'
                    ORDER BY $orden $sentido";
            //echo $consulta;
            return DB::selectAll($consulta, self::class);
    }
    
    //método para recuperar las mascotas de un usuario
    public function getMascotas(){
        $consulta= "SELECT * FROM mascotas WHERE iduser=$this->id";
        return DB::selectAll($consulta, 'Mascota');
    }
    
    //método para recuperar las fotos de un usuario
    public function getFotos(){
        $consulta= "SELECT * FROM v_fotos WHERE iduser= $this->id";
        return DB::selectAll($consulta, 'Foto');
    }
    
    //__toString
    public function __toString(){
        return "USUARIO $this->id: $this->nombre $this->apellidos (user $this->user)";
    }
    
            
}