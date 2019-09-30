<?PHP 
class Materia{
    public $nombre;
    public $codigo;
    public $cupo;
    public $aula;
   

    public function __construct($nombr, $cod, $cup,$au){
        $this->nombre = $nombr; 
        $this->codigo = $cod; 
        $this->cupo = $cup; 
        $this->aula = $au; 
    }

}
?>