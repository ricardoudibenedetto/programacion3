<?PHP 
    
class ServicioDao{
    public function __construct(){

    }

    function guardar($path, $dato ) {
       /*  $archivo = fopen($path,"a");
        if(fwrite($archivo,$dato->nombre."-".$dato->apellido."-".$dato->legajo.PHP_EOL)) {
            echo "escribio\n";
        }
        fclose($archivo); */
        $objetos = $this->leer($path);
        array_push($objetos,$dato);
        $json= json_encode($objetos);
        var_dump($json);
        $archivo = fopen($path,"w");
        if(fwrite($archivo,$json)) {
            echo "escribio\n";
        }
        fclose($archivo);
    }

    function leer($path) {
        /* $personas = array();
        $archivo = fopen($path,"r");
            while(!feof($archivo)) {
               $linea = fgets($archivo);
               if($linea != "") {
                   $persona = new stdClass();
                   $persona->nombre = explode("-",$linea)[0];
                   $persona->apellido = explode("-",$linea)[1];
                   $persona->legajo = explode("-",$linea)[2];
                   array_push($personas,$persona);
               }
            }
       fclose($archivo); */
       
       $archivo = fopen($path,"r");
       $objetos = json_decode(fread($archivo,filesize($path)));
        
       return $objetos;
    }


    function modificar($path, $dato) {
       $objetos = $this->leer($path);
        for($i=0; $i < count($objetos) ; $i++) { 
           if($objetos[$i]->legajo == $dato->legajo)
           {
               $objetos[$i] = $dato;
               $this->guardar($path, $objetos);
               break;
           }
        }       
        echo "modifico\n";
    }
}


?>