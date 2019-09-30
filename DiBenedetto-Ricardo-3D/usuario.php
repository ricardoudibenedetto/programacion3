<?PHP 
    class Usuario{
        public $legajo;
        public $email;
        public $nombre;
        public $clave;
        public $foto1;
        public $foto2;
    
        public function __construct($leg, $nomb, $emai,$clav,$fot1,$fot2){
            $this->legajo = $leg; 
            $this->nombre = $nomb; 
            $this->email = $emai; 
            $this->clave = $clav; 
            $this->foto1 = $fot1;
            $this->foto2 = $fot2;
        }
    }

?>