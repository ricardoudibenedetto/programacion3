<?php
session_start();
include '../clases/alumno.php';
include '../clases/alumnoDao.php';
$indice = 0;
$alumnos[$indice] = new Alumno('pepe', 23232, 32323 , 3);
$alumnoDao = new AlumnoDao();

echo $_SERVER["REQUEST_METHOD"] ."\n";

//if($_SERVER['request'])
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    
    /* for ($i=0; $i < count($alumnos); $i++) {
        echo $alumnos[$i] -> nombre;
    } */
    /* 
    echo json_encode($alumnos); */
    $alumnoDao->listar();

}



if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(isset($_POST['nombre']) && isset($_POST['legajo']) && isset($_POST['dni']) && isset($_POST['cuatrimestre']))
    {
        if($alumnoDao->guardar(new Alumno($_POST["nombre"],$_POST["dni"] ,$_POST["legajo"],$_POST["cuatrimestre"])))
        {
           /*  echo "se guardo\n";
            echo json_encode($alumnoDao->alumnos); */

        }
        
       /*  array_push($alumnos, new Alumno($_POST["nombre"],$_POST["dni"] ,$_POST["legajo"],$_POST["cuatrimestre"]));
        echo "entro \n"; */
       /*  echo json_encode($alumnos); */
    }
}

if($_SERVER["REQUEST_METHOD"] == 'DELETE'){
  /*   var_dump($_POST);    */
    if(isset($_POST['nombre']) && isset($_POST['legajo']) && isset($_POST['dni']) && isset($_POST['cuatrimestre']))
    {
        //no entra aca
        if($alumnoDao->borrar(new Alumno($_POST["nombre"],$_POST["dni"] ,$_POST["legajo"],$_POST["cuatrimestre"])))
        {
            echo "se borro\n";
            echo json_encode($alumnoDao->alumnos);
        }else{
            echo "no se borro";
        }
    }
}

/* var_dump($alumnoDao);
 */
/*  session_destroy(); */
?>