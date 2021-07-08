<?php
// clase Foto 
class Foto{
    //PROPIEDADES
    public $id=0, $fichero='', $ubicacion='', $idmascota=0;
    
    //método para recuperar un array con fotos
    public static function get():array{
        $consulta= "SELECT * FROM v_fotos";
        return DB::selectAll($consulta, self::class);
    }
    
    //método para recuperar una foto a partir de su ID (o null)
    public static function getById(int $id){
        $consulta= "SELECT * FROM v_fotos WHERE id=$id";
        return DB::select($consulta, self::class);
    }
    
    //método para guardar una nueva foto en bdd
    public function guardar(){
        $consulta= "INSERT INTO fotos(fichero, ubicacion, idmascota)
                    VALUES('$this->fichero', '$this->ubicacion', $this->idmascota)";
        
        //guarda el nuevo foto en la BDD y actualiza el ID con el autonumerico
        // que se le ha asignado en la bdd
        $this->id = DB::insert($consulta);
        
        //echo $consulta;
        
        //retorna el id del nuevo ejemplar (o false si falló la inserción)
        return $this->id;
    }
    
    //método que actualiza una foto en la bdd
    //(no el faré servir però el faig per si cal més endevant...)
    public function actualizar(){
        //prepara la consulta
        $consulta= "UPDATE fotos SET
                        fichero= '$this->fichero',
                        ubicacion= '$this->ubicacion',
                        idmascota= $this->idmascota
                    WHERE id= $this->id";
        
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún problema
        return DB::update($consulta);
    }
    
    //método que borra una foto de la bdd
    public static function borrar(int $id){
        //prepara la consulta
        $consulta= "DELETE FROM fotos WHERE id= $id";
        
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún error
        return DB::delete($consulta);
    }
    
    
    //método para filtrar de forma avanzada
    public static function getFiltered(string $campo= 'tipo', string $valor='',
        string $orden='id', string $sentido= 'ASC'):array{
            $consulta= "SELECT *
                    FROM v_fotos
                    WHERE $campo LIKE '%$valor%'
                    ORDER BY $orden $sentido";
            //echo $consulta;
            return DB::selectAll($consulta, self::class);
    }
    
    
    //__toString()
    public function __toString(){
        return "FOTO $this->id $this->fichero ($this->ubicacion)";
    }
    
    
}