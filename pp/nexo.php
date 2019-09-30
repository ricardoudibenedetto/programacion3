<?PHP 
    include "./alumno.php";
    include "./service.php";
    include "./materia.php";
    $service = new Service();

    if($_SERVER["REQUEST_METHOD"] == 'GET'){

        if(isset($_GET["caso"]))
        switch($_GET["caso"]){
            case "consultarAlumno":
            var_dump($service->buscarTodos($service->leer("./alumnos.txt"), $_GET["apellido"]));
                break;
            case "inscribirAlumno":
                $service->inscribirAlumno(new alumno($_GET["nombre"],$_GET["apellido"],$_GET["email"],"no pick"),$_GET["materia"],$_GET["codigo"]);
            //var_dump($service->buscarTodos($service->leer("./alumnos.txt"), $_GET["apellido"]));
                break;
        }
        
    
    }

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
            switch($_POST["caso"]){
                case 'cargarAlumno':
                echo "cargarAlumno ";
                $alumno = new alumno($_POST["nombre"], $_POST["apellido"], $_POST["email"], $service->nombreImgFormat($_POST['email']));
                $service->guardar("./alumnos.txt",$alumno);
                $service->guardarImg($alumno);
                break;
                case 'cargarMateria':
                echo "cargarMateria";
                $service->guardar("./materias.txt", new materia($_POST["nombre"], $_POST["codigo"], $_POST["cupo"], $_POST["aula"]));
                break;
                default:
                var_dump($_POST);
                break;
            }
            echo "entro";
        echo "entro al post";
    
    }

?>