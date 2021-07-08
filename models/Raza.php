<?php
// clase Raza
class Raza{
    //PROPIEDADES
    public $id=0, $nombre='', $descripcion='', $idtipo=0;
    
    //método para recuperar un array con razas
    public static function get():array{
        $consulta= "SELECT * FROM razas ORDER BY nombre";
        return DB::selectAll($consulta, self::class);
    }
    
    //método para recuperar una raza a partir de su ID (o null)
    public static function getById(int $id){
        $consulta= "SELECT * FROM razas WHERE id=$id";
        return DB::select($consulta, self::class);
    }
    
    //método para guardar una nueva raza en bdd
    public function guardar(){
        $consulta= "INSERT INTO razas(nombre, descripcion, idtipo)
                    VALUES('$this->nombre', '$this->descripcion', $this->idtipo)";
        
        //guarda la nueva raza en la BDD y actualiza el ID con el autonumerico
        // que se le ha asignado en la bdd
        $this->id = DB::insert($consulta);
        
        //echo $consulta;
        
        //retorna el id de la nueva raza (o false si falló la inserción)
        return $this->id;
    }
    
    //método que actualiza una raza en la bdd
    //(no el faré servir però el faig per si cal més endevant...)
    public function actualizar(){
        //prepara la consulta
        $consulta= "UPDATE razas SET
                        nombre= '$this->nombre',
                        descripcion= '$this->descripcion',
                        idtipo= $this->idtipo
                    WHERE id= $this->id";
        
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún problema
        return DB::update($consulta);
    }
    
    //método que borra una raza de la bdd
    public static function borrar(int $id){
        //prepara la consulta
        $consulta= "DELETE FROM razas WHERE id= $id";
        
        //lanza la consulta y retorna el numero de filas afectadas
        //o false si hubo algún error
        return DB::delete($consulta);
    }
    
    //__toString()
    public function __toString(){
        return "FOTO $this->id $this->fichero ($this->ubicacion)";
    }
    
    
}