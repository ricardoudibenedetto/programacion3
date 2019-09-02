<?PHP 
/* include 'funciones.php';
require_once 'funciones.php'; */
/* include 'clases/persona.php'; */
include 'clases/alumno.php';
/* $perso = new Persona('ricardo', 123123);
$perso->saludar(); */

$alumno = new Alumno('ricardo', 38611173, 1231, 3);
$alumno->saludar();
echo "<br/>"."legajo:".$alumno->legajo;
echo $alumno->cuatrimestre;
$alumno->saludar();
/*  saludar('pepe');
    echo "<br/>"."hola mundo"; */
?>