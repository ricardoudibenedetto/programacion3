<?PHP   


class Info{
    public $hora;
    public $ip;

    public function __construct($h, $ip){
        $this->hora = $h;
        $this->ip = $ip;
    }

}