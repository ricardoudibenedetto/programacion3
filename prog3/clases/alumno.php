<?PHP 
include './clases/persona.php';
class Alumno extends persona{
   
    public $cuatrimestre;
    public $legajo;

    public function __construct($nombre, $dni, $legajo , $cuatrimestre){
        parent::__construct($nombre , $dni);
        $this->legajo = $legajo;
        $this->cuatrimestre = $cuatrimestre;
    }

    // public function Saludar(){
    //     return parent::Saludar()." ".$this->legajo." ".$this->cuatrimestre;
    //     }
}

?>