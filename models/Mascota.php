<?php
class Mascota{
    
    //PROPIEDADES
    public $id=0, $nombre='', $sexo='', $biografia='', $nacimiento='',
    $fallecimiento=NULL, $user='', $idraza=0, $iduser=0;
    
    //MÉTODOS
    //método para recuperar todas las mascotas
    public static function get(){
        $consulta= "SELECT * FROM mascotas";
        return DB::selectAll($consulta, self::class);
    }
    
    //método para recuperar una mascota por su id
    public static function getById(int $id):?Mascota{
        $consulta= "SELECT * FROM mascotas WHERE id=$id";
        return DB::select($consulta, self::class);
    }
    
    //método para guardar una nueva mascota en la BDD
    public function guardar(){
        //prepara la consulta de inserción
        $consulta= "INSERT INTO mascotas(nombre, sexo, biografia, nacimiento,
                    fallecimiento, user, idraza, iduser)
                    VALUES('$this->nombre', '$this->sexo', '$this->biografia',
                            '$this->nacimiento', '$this->fallecimiento', 
                            '$this->user', $this->idraza, $this->iduser)";
        //echo $consulta;
        //guarda la nueva mascota en la BDD y actualiza el ID con el autonumerico
        // que se le ha asignado en la bdd
        $this->id = DB::insert($consulta); //ho fiquem aquí per tal que l'objecte
        // creat tingui el id!!
        
        //retorna el id de la nueva mascota (o false si falló la inserción)
        return $this->id;
    }
    
    //método que actualiza una mascota en la bdd
    public function actualizar(){
        //prepara la consulta
        $consulta= "UPDATE mascotas SET
                        nombre= '$this->nombre',
                        sexo= '$this->sexo',
                        biografia= '$this->biografia',
                        nacimiento= '$this->nacimiento',
                        fallecimiento= '$this->fallecimiento',
                        user= '$this->user',
                        idraza= $this->idraza,
                        iduser= $this->iduser
                    WHERE id= $this->id";
        //echo $consulta;
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún problema
        return DB::update($consulta);
    }
    
    //método que borra una mascota de la bdd
    public static function borrar(int $id){
        //prepara la consulta
        $consulta= "DELETE FROM mascotas WHERE id= $id";
        
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún error
        return DB::delete($consulta);
    }
    
    //método para filtrar de forma avanzada
    public static function getFiltered(string $campo= 'nombre', string $valor='',
        string $orden='id', string $sentido= 'ASC'):array{
            $consulta= "SELECT *
                    FROM mascotas
                    WHERE $campo LIKE '%$valor%'
                    ORDER BY $orden $sentido";
        //echo $consulta;    
        return DB::selectAll($consulta, self::class);
    }
    
    //método para recuperar las fotos de una mascota
    public function getFotos(){
        $consulta= "SELECT * FROM v_fotos WHERE idmascota=$this->id";
        return DB::selectAll($consulta, 'Foto');
    }
    
    //__toString
    public function __toString(){
        return "MASCOTA $this->id: $this->nombre - $this->sexo, de $this->user";
    }
    
}