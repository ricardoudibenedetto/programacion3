<?PHP 
class Persona{

    public $nombre;
    public $dni;

   public function __construct($nomb, $dn){
        $this->nombre = $nomb;
        $this->dni = $dn;
    }

    function saludar(){
        echo "hola soy"." ".$this->nombre;
    }
}
/* 
$persona = new Persona("ricardo", 3861113);

$persona.saludar();
 */
?>