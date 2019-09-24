<?PHP 

class Alumno{
    public function __construct($nom,$leg){
        $this->nombre = $nom;
        $this->legajo = $leg;
    }
    public  $nombre;
    public  $legajo;
}

$alumnos = [];


$a1 = new Alumno("pepe",123);
$a4 = new Alumno("pepe",123);
$a5 = new Alumno("pepe",123);
$a6 = new Alumno("pepe",123);
$a2 = new Alumno("luis",456);
$a3 = new Alumno("robert",789);

/* array_push($alumnos,$a1);
array_push($alumnos,$a2);
array_push($alumnos,$a3);
 */


$alumnos[$a1->legajo] = $a1;
$alumnos[$a2->legajo] = $a2;
$alumnos[$a3->legajo] = $a3;
$alumnos[$a4->legajo] = $a4;
$alumnos[$a5->legajo] = $a5;
$alumnos[$a6->legajo] = $a6;

//var_dump(json_encode($alumnos) );
/* foreach($alumos as $alum){
 var_dump($alum);   
} */
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    
    /* for ($i=0; $i < count($alumnos); $i++) {
        echo $alumnos[$i] -> nombre;
    } */
    /* 
    echo json_encode($alumnos); */

    var_dump(findAll($alumnos,$_GET["id"])); 

}

function find($arr, $id){
    foreach($arr as $al){
        if($al->legajo == $id){
            return $al;
        }
        else{
        }
        // var_dump( array_search($a2->legajo,$alumnos));
    }
    return "no se encntro nada";
}


function findAll($arr, $id){
    $todos=[];
    foreach($arr as $al){
        if($al->nombre == $id){
            array_push($todos,$al);
        }
        else{
        }
        // var_dump( array_search($a2->legajo,$alumnos));
    }
    if(count($todos) == 0){
        return "no se encontro nada";
    }else {
        return $todos;
    }
}

?>