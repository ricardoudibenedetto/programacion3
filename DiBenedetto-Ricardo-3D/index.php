<?PHP 
    include "./service.php";
    include "./usuario.php";
    include "./info.php";
    $service = new Service();

    if($_SERVER["REQUEST_METHOD"] == 'GET'){

        if(isset($_GET["caso"]))
        switch($_GET["caso"]){
            case "login":
            var_dump($service->login($_GET["clave"],$_GET["legajo"]));
            $info = new Info(date('H:i'), getHostByName(getHostName()));
            
            $service->guardar("./info.log",$info);
                break;
        }
        
    
    }
    
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
            switch($_POST["caso"]){
                case 'cargarUsuario':
                    if(isset($_POST["legajo"]) && isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_FILES["foto1"]) && isset($_FILES["foto2"])) {
                        $usuario = new usuario($_POST["legajo"],$_POST["email"], $_POST["nombre"],$_POST["clave"], $service->nombreImgFormat($_POST['legajo'],1),$service->nombreImgFormat($_POST['legajo'],2));
                        $service->guardar("./usuarios.txt",$usuario);
                        $service->guardarImg($usuario,1);
                        $service->guardarImg($usuario,2);
                    }
                break;
                case 'modificarUsuario':
                    $usuario = new usuario($_POST["legajo"],$_POST["email"], $_POST["nombre"],$_POST["clave"], $service->nombreImgFormat($_POST['legajo'],1),$service->nombreImgFormat($_POST['legajo'],2));
                    $service->modificar("./usuarios.txt",$usuario);
                break;
                default:
                   
                break;
            }
         
    
    }
?>