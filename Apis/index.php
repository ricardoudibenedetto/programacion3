<?php
//carga todas las dependencias
require 'vendor/autoload.php';
include "./alumnos.php";


$alumnos;
$app = new \Slim\App();

$a1 = new alumno("juan", "lopez", "juanl@gmail.com",1);
$a2 = new alumno("juan", "lopez", "juanl@gmail.com",2);
$a3 = new alumno("juan", "lopez", "juanl@gmail.com",3);
$a4 = new alumno("juan", "lopez", "juanl@gmail.com",4);

array_push($alumnos , $a1);
array_push($alumnos , $a2);
array_push($alumnos , $a3);
array_push($alumnos , $a4);

$app->group('/saludar' , function (){

  $this->get('/listarTodos', function ( $req, $res, $args = []) {
    return $res->withStatus(200)->write("hola");
  });

  $this->get('/listarPorId/{id}', function ( $req, $res, $args = []) {

    $data = array('name' => $args['nombre'], 'age' => 40);
    /* $nombre = $args['nombre'];
    return $res->withStatus(200)->write("hola $nombre"); */
    return  $res->withJson($data, 200);
  });


});

$app->run();
