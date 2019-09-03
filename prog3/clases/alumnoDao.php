<?PHP
require_once '../clases/alumno.php';

class AlumnoDao{
 public $alumnos;
 function __construct(){
     if(!isset($_SESSION["listado"])){
        // $this->alumnos = array();
        // array_push($this->alumnos , new Alumno("tony",2222,1111,3));
        $_SESSION["listado"] = array();
    }
    $this->alumnos = $_SESSION["listado"];
  }
  public function listar(){
      echo json_encode($_SESSION["listado"]);
     /*  echo json_encode($this->alumnos); */
  }
  public function guardar($alumno)
  {
    array_push($this->alumnos, $alumno);
    if(isset($_SESSION["listado"])){
        echo "ENTRO AL GUARDAR";
        $_SESSION["listado"] = $this->alumnos;
    }
    var_dump($this->alumnos);
    return true;
  }

  public function borrar($alumno){
      for ($i=0; $i < count($this->alumnos) ; $i++) { 
          if($this->alumnos[$i]->nombre == $alumno->nombre )
          {
              unset($this->alumnos[$i]);
              echo "se borro";
              return true;
          }
      }
      return false;
  }
}

?>