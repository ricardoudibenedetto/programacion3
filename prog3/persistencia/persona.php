<?PHP 
class Persona{

    public $nombre;
    public $apellido;
    public $legajo;

   public function __construct($nomb, $apelli, $legaj, $img){
        $this->nombre = $nomb;
        $this->apellido = $apelli;
        $this->legajo = $legaj;
        $this->imagen = $img;
    }

    function saludar(){
        echo "hola soy"." ".$this->nombre;
    }
}

?>