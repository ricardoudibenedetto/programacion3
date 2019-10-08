<?PHP
class Alumno{
    public $nombre;
    public $apellido;
    public $email;
    public $id;


    public function __construct($nombr, $apellid, $emai,$i){
        $this->nombre = $nombr;
        $this->apellido = $apellid;
        $this->email = $emai;
        $this->id = $i;
    }


}

?>
