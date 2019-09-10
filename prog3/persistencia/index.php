<?PHP 
    include "../persistencia/service.php";
    include "../persistencia/persona.php";
    $service = new ServicioDao();

    if($_SERVER["REQUEST_METHOD"] == 'POST'){

        /* switch($_POST["method"]) {
            case POST:
        code to be executed if n=label1;
        break;
        } */
        
        echo "entro";
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['legajo']) )
        {
          /*   $archivo = fopen("./archivo.txt","a");
            if(fwrite($archivo,$_POST['nombre']."-".$_POST['apellido']."-".$_POST['legajo'].PHP_EOL)) {
                echo "escribio";
            }
            fclose($archivo); */
            $service->guardar("./archivo.txt",new Persona($_POST['nombre'],$_POST['apellido'],$_POST['legajo']));
        }
    }

    $personas;
    $i=0;
    if($_SERVER["REQUEST_METHOD"] == 'GET'){
        /* $personas = array();
        $archivo = fopen("./archivo.txt","r");
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

            $personas = $service->leer("./archivo.txt");
            echo json_encode($personas);
    }


    if($_SERVER["REQUEST_METHOD"] == 'PUT') {
        $service->modificar("./archivo.txt",new Persona($_POST['nombre'],$_POST['apellido'],$_POST['legajo']));
    }
   
    

?>