<?php 
    class Service{
        
        function guardar($path, $dato ) {
            $objetos = $this->leer($path);
            array_push($objetos,$dato);
            $json = json_encode($objetos);
            $archivo = fopen($path,"w");
            if(fwrite($archivo,$json)) {
                var_dump($json);
                echo "se guardo";
            }

            fclose($archivo);
        }
        
        function guardarImg($dato) {
            $archivoTemp = $_FILES["foto"]["tmp_name"];
            $index = count(explode("/",$_FILES["foto"]["type"]))-1;
            $ext =  explode(".",$_FILES["foto"]["name"])[$index];
            move_uploaded_file($archivoTemp, "./img/".$dato->email.".".$ext);
        }

        function nombreImgFormat($nombreImg) {
            return $nombreImg.".".explode(".",$_FILES["foto"]["name"])[count(explode("/",$_FILES["foto"]["type"]))-1];
        }

        
        function buscarTodos($arr, $id){
            $todos=[];
            foreach($arr as $al){
                if(strtoupper($al->apellido) == strtoupper($id)){
                    array_push($todos,$al);
                }
                else{
                }
                // var_dump( array_search($a2->legajo,$alumnos));
            }
            if(count($todos) == 0){
                return "no se encontro nada";
            }else {
                return $todos;
            }
        }

        function buscarUno($arr, $id){
            foreach($arr as $al){
                if($al->legajo == $id){
                    return $al;
                }
                else{
                }
                // var_dump( array_search($a2->legajo,$alumnos));
            }
            return "no se encntro nada";
        }

        function leer($path) {
           $archivo = fopen($path,"r");
           $objetos = json_decode(fread($archivo,filesize($path)));
            
           return $objetos;
        }

        function buscarMateria($materia , $cod) {
            $exist = false; 
            $materias = $this->leer("./materias.txt");
            foreach($materias as $mat) {
                if($mat->nombre == $materia && $mat->codigo == $cod) {
                   $exist = true;
                   break;
                }
            }

            return $exist;

        }
        function inscribirAlumno($dato , $materia, $codigo) {
            //$alumnos = $this->leer("./alumnos.txt");
            $materias = $this->leer("./materias.txt");
            if($this->buscarMateria($materia, $codigo))
            {
                foreach($materias as $mat) {
                    if($mat->codigo == $codigo  && $mat->nombre == $materia) {
                        if($mat->cupo > 0){
                            $this->guardar("./inscripciones.txt", $dato);
                            $mat->cupo -= 1;
                            //$this->guardar("./materias.txt", $mat); hacer funcion para guardar materia q modifique su valor
                        }else{
                            echo "no hay cupo para la materia";
                        }
                    }else{
    
                        echo $materia." ".$codigo;
                    }
                }

            }else{
                echo "no existe la materia";
            }
            
        }
    }
?>