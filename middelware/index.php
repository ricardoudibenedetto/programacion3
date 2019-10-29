<?PHP
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;

  require_once 'vendor/autoload.php';
  include "./usuario.php";
  include "./middelware.php";

  $config['displayErrorDetails'] = true;
  $config['addContentLengthHeader'] = false;

  $app = new \Slim\App(["settings" => $config]);

  $usuario1 = new usuario("pepe", "asd123", "pepe@gmail.com","1");



  $app->group('/usuario' , function (){


    $this->get('/log', function ( $req, $res, $args = []) {
      return $res->withStatus(200)->write("hola");
    });
    $this->post('/log', function ( $req, $res, $args = []) {
      var_dump($req->getParsedBody());
      return $res->withStatus(200)->write(" hola ");
    });

    $this->get('/listarPorId/{id}', function ( $req, $res, $args = []) {

      $data = array('name' => $args['nombre'], 'age' => 40);
      /* $nombre = $args['nombre'];
      return $res->withStatus(200)->write("hola $nombre"); */
      return  $res->withJson($data, 200);
    });


  });

  $app->add(\middelware::class . ":auth");
  $app->run();
?>
