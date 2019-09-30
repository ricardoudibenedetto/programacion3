<?PHP 
class Alumno{
    public $nombre;
    public $apellido;
    public $email;
    public $foto;
   

    public function __construct($nombr, $apellid, $emai,$fot){
        $this->nombre = $nombr; 
        $this->apellido = $apellid; 
        $this->email = $emai; 
        $this->foto = $fot; 
    }

   
}

?>