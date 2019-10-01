<?php 
    class Service{
        
        function guardar($path, $dato) {
            $objetos = $this->leer($path);
            if(is_array($dato)) {
                
                echo "es array ";
                $json = json_encode($dato);
                $archivo = fopen($path,"w");
                if(fwrite($archivo,$json)) {
                    echo "escribio\n";
                }
                fclose($archivo);
                var_dump($json);
            }else
            if(!$this->buscarUno($objetos,$dato->legajo)) {
                array_push($objetos,$dato);
                $json = json_encode($objetos);
                $archivo = fopen($path,"w");
                if(fwrite($archivo,$json)) {
                    //var_dump($json);
                    echo "se guardo";
                }
    
                fclose($archivo);
            }else {
                $error = [];
                $mensaje = array('error' => "el legajo ya existe");
                array_push($error, $mensaje );
               echo json_encode($error);
            }
        }
        
        function guardarImg($dato, $numeroDeFoto) {
            if($numeroDeFoto == 1) {
                $archivoTemp = $_FILES["foto1"]["tmp_name"];
                $index = count(explode("/",$_FILES["foto1"]["type"]))-1;
                $ext =  explode(".",$_FILES["foto1"]["name"])[$index];
                move_uploaded_file($archivoTemp, "./img/".$dato->legajo."foto1".".".$ext);
            }else {
                $archivoTemp = $_FILES["foto2"]["tmp_name"];
                $index = count(explode("/",$_FILES["foto2"]["type"]))-1;
                $ext =  explode(".",$_FILES["foto2"]["name"])[$index];
                move_uploaded_file($archivoTemp, "./img/".$dato->legajo."foto2".".".$ext);
            }
        }

        function nombreImgFormat($nombreImg, $numDeFoto) {
            if($numDeFoto == 1) {
                return $nombreImg."Foto1".".".explode(".",$_FILES["foto1"]["name"])[count(explode("/",$_FILES["foto1"]["type"]))-1];
            }else {

                return $nombreImg."Foto2".".".explode(".",$_FILES["foto1"]["name"])[count(explode("/",$_FILES["foto1"]["type"]))-1];
            }

        }

        function login($clave, $legajo ){
            $usuarios = $this->leer("./usuarios.txt");
            $exist = false;

            foreach ($usuarios as $us) {
                if(strtoupper($us->clave)  == strtoupper($clave)  && strtoupper($us->legajo)  == strtoupper($legajo)){
                    $exist = true;
                    break;
                }
            }

            if($exist) {
                foreach ($usuarios as $usr) {
                    if($usr->legajo == $legajo){
                        var_dump($usr);
                        break;
                    }
                }
            }
            else{
                $error = [];
                $mensaje = array('error' => "no se encontro el usuario");
                array_push($error, $mensaje );
               echo json_encode($error);
            }

        }
        

        function buscarUno($arr, $id){
            foreach($arr as $al){
                if($al->legajo == $id){
                    return true;
                }            
            }
            return false;
            
        }

        function leer($path) {
           $archivo = fopen($path,"r");
           $objetos = json_decode(fread($archivo,filesize($path)));
            
           return $objetos;
        }

        function modificar($path, $dato) {
            $objetos = $this->leer($path);
             for($i=0; $i < count($objetos) ; $i++) { 
                if($objetos[$i]->legajo == $dato->legajo) {
                    if($dato->foto1 != null) {
                        
                        $this->modificarImg($objetos[$i],1);
                        echo "foto1";
                    }else{
                        
                        $dato->foto1 = $objetos[$i]->foto1;
                    }
                    if($dato->foto2 != null) {
                       echo "foto2";
                        $this->modificarImg($objetos[$i],2);
                    }else{
                        
                        $dato->foto1 = $objetos[$i]->foto2;
                    }
                    $objetos[$i] = $dato;
                    $this->guardar($path, $objetos);
                    break;
                }
             }       
             echo "modifico\n";
         }

        function modificarImg($dato,$num) {
            if($dato->foto1 != null && $num == 1) {
                copy("./img/".$dato->foto1, "./BackUp/".$dato->foto1);
                $this->guardarImg($dato, $num);
            }else{
                copy("./img/".$dato->foto1, "./BackUp/".$dato->foto2);
                $this->guardarImg($dato, $num);
            }
        }
    }
?>