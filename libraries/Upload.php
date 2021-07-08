<?php
class Upload{
    
    //PROPIEDADES
    private $ficheros= []; //contendrá la información de los ficheros
    
    //CONSTRUCTOR
    public function __construct(){
        $this->ficheros= $_FILES;
    }
    
    //método para comprobar si llega un fichero con una clave determinada
    //la clave coincide con el nombre del input de tipo 'file'
    public function llegaFichero(string $clave):bool{
        return !empty($this->ficheros[$clave]) && $this->ficheros[$clave]['error']!=4;
    }
    
    //método estatico para generar nombres únicos
    public static function nombreUnico(string $ext='', string $pre=''):string{
        $nombre= uniqid($pre);
        //retorna el nuevo nombre con la extensión (si se indicó)
        return $ext ? "$nombre.$ext" : $nombre;
    }
    
    //método para el procesamiento del fichero subido
    public function procesar(string $clave='fichero', string $carpeta='', bool $unico=true,
        int $max=0, string $mime=''):string{
        
        //$f contendrá el array con la info del fichero a subir
        //['error'],['name'], ['tmp_name'], ['mime'], ['size']
        $f= $this->ficheros[$clave];
        
        //1. combrobar que no se ha producido error en la subida
        if($f['error'])
            throw new Exception("Error ".$f['error']." en la subida de ".$f['name']);
        
        //2. comprobar que el fichero no supera el tamaño máximo
        if($max && $f['size']>$max)
            throw new Exception("El fichero supera los $max bytes");
        
        //3. Comprobar el tipo real del fichero con la extension fileinfo    
        //ruta temporal
        $rutaTemporal= $f['tmp_name'];
        $tipoMimeReal= (new finfo(FILEINFO_MIME_TYPE))->file($rutaTemporal);
        
        //retoques para que no falle la expresión regular en la comprobación 
        $mimetmp= str_replace('*', '', $mime); //quito el * (si lo tiene)
        $mimetmp= preg_quote($mimetmp, '/'); //escapo los caracteres especiales
        
        if(!preg_match("/^$mimetmp/i", $tipoMimeReal)) //comprobación del tipo mediante regexp
            throw new Exception("El fichero no es de tipo $mime");
        
        //4. calcular la ruta final, dependiendo de si el nombre del fichero tiene que
        //ser nombre único o no
        $rutaFinal= $unico?
            $carpeta."/".self::nombreUnico(pathinfo($f['name'], PATHINFO_EXTENSION)) :
            $carpeta."/".$f['name'];
        
        //mover el fichero al destino
        if(!move_uploaded_file($rutaTemporal, $rutaFinal))
            throw new Exception("Error al mover de $rutaTemporal a $rutaFinal");
        
        return $rutaFinal;   
    }
    
    //Método que sube todos los ficheros que lleguen de golpe
    public function procesarTodo(string $ruta='', bool $unico=true, int $max=0,
                                string $mime=''):array{
        $rutas= [];
        
        //llama al método procesar para cada fichero
        foreach($this->ficheros as $clave=>$fichero)
            $rutas[]= $this->procesar($clave, $ruta, $unico, $max, $mime);
        
        //retorna un array con las rutas de todos los ficheros subidos
        return $rutas;
        
    }    
    
}