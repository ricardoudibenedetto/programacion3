<?PHP
class Usuario{
    public $nombre;
    public $clave;
    public $email;
    public $id;


    public function __construct($nombre, $clav, $emai,$i){
        $this->nombre = $nombre;
        $this->clave = $clav;
        $this->email = $emai;
        $this->id = $i;
    }


}

?>
