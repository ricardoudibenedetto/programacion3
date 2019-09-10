<?PHP 
class Persona{

    public $nombre;
    public $apellido;
    public $legajo;

   public function __construct($nomb, $apelli, $legaj){
        $this->nombre = $nomb;
        $this->apellido = $apelli;
        $this->legajo = $legaj;
    }

    function saludar(){
        echo "hola soy"." ".$this->nombre;
    }
}

?>