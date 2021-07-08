<?php
class DB{
    // Propiedad que guardará la conexión con BDD (objeto mysqli)
    private static $conexion= null;
    
    // Método que conecta o recupera la conexión con la BDD
    public static function get():mysqli{
        
        //si no estábamos conectados a la bdd...
        if(!self::$conexion){
            //conecta con la bdd
            self::$conexion= @new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            
            //si se produce un error al conectar con la bdd
            if(self::$conexion->connect_errno)
                throw new Exception('Error al conectar con la BDD');
            
            //si todo fue bien
            self::$conexion->set_charset(DB_CHARSET);
        }
        return self::$conexion;
    }
    
    //Método que lanza excepciones cuando de producen errores
    //en nuestras consultas de selección.
    //Si esta activado el modo DEBUG en la configuracón, el error será más
    //detallado, cosa que ayudará a corregir más fácilmente los errores en
    //nuestras consultas
    private static function error(){
        if(DEBUG)
            throw new Exception('ERROR: '.self::get()->error); //error detallado
        else 
            throw new Exception('Se produjo un error'); //error genérico
    }
    
    //Método para realizar consultas SELECT de un resultado
    public static function select(string $consulta, string $class='stdClass'){
        
        //recupera la conexión y lanza la consulta
        $resultado= self::get()->query($consulta);
        
        //si no funcionó la consulta lanza un error
        if($resultado===false) self::error();
        
        //si todo fue bien...
        $objeto= $resultado->fetch_object($class); //convertir el resultado en objeto
        $resultado-> free(); //liberar memoria
        return $objeto; //retorna el objeto recuperado (o null)
        
    }
    
    //Método para realizar consultas SELECT de múltiples resultados
    public static function selectAll(string $consulta, string $class='stdClass'):array{
        
        //recupera la conexión y lanza la consulta
        $resultados= self::get()->query($consulta);
        
        //si no funcionó la consulta lanza un error
        if($resultados===false) self::error();
        
        //si todo fue bien...
        $objetos= [];
        
        //convertimos cada resultado en un objeto y lo metemos en el array
        while($r= $resultados->fetch_object($class))
            $objetos[]= $r;
        
        $resultados-> free(); //liberamos memoria
        return $objetos; //retornamos el resultado
    }
    
    // Los siguientes métodos retornan false si la consulta falla
    
    //Método para realizar consultas INSERT
    //retorna el valor del ID autonumérico o false en caso de error
    public static function insert($consulta){
        return self::get()->query($consulta)? self::get()->insert_id : false;
    }
    
    //Método para realizar consultas UPDATE
    //retorna el número de filas afectadas o false en caso de error
    public static function update($consulta){
        return self::get()->query($consulta)? self::get()->affected_rows : false;
    }
    
    //Método para realizar consultas DELETE
    //retorna el número de filas afectadas o false en caso de error
    public static function delete($consulta){
        return self::get()->query($consulta)? self::get()->affected_rows : false;
    }
}