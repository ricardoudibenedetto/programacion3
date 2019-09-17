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
        if(is_array($dato)) {
            echo "es array ";
            $json = json_encode($dato);
            $archivo = fopen($path,"w");
            if(fwrite($archivo,$json)) {
                echo "escribio\n";
            }
            fclose($archivo);
            var_dump($json);
        }else {
            echo "no array ";
            $objetos = $this->leer($path);
            array_push($objetos,$dato);
            $json = json_encode($objetos);
            $archivo = fopen($path,"w");
            
            if(fwrite($archivo,$json)) {
                echo "escribioooo\n";
                if($dato->imagen != null) {
                $this->guardarImg($dato);
                }
            }

            fclose($archivo);
            var_dump($json);
        }
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

    function guardarImg($dato) {
        $archivoTemp = $_FILES["img"]["tmp_name"];
        $index = count(explode("/",$_FILES["img"]["type"]))-1;
        $ext =  explode(".",$_FILES["img"]["name"])[$index];
        move_uploaded_file($archivoTemp, "./img/".$dato->legajo.".".$ext);
    }
    function modificarImg($dato) {
        if($dato->imagen != null) {
            copy("./img/".$dato->imagen, "./BackUp/".$dato->imagen);
            $this->guardarImg($dato);
        }
    }

    function nombreImgFormat($nombreImg) {
        return $nombreImg.".".explode(".",$_FILES["img"]["name"])[count(explode("/",$_FILES["img"]["type"]))-1];
    }

    function modificar($path, $dato) {
       $objetos = $this->leer($path);
        for($i=0; $i < count($objetos) ; $i++) { 
           if($objetos[$i]->legajo == $dato->legajo) {
               if($dato->imagen != null) {
                   //$this->guardarImg($dato);
                   $this->modificarImg($objetos[$i]);
               }else {
                   $dato->imagen = $objetos[$i]->imagen;
               }
               $objetos[$i] = $dato;
               $this->guardar($path, $objetos);
               break;
           }
        }       
        echo "modifico\n";
    }
}


?>