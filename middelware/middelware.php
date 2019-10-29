<?php
  include './autentic.php';
class middelware{
  function auth($request, $response, $next) {
    /* $response->write("  antes  ");
    if($request->getParsedBody()["email"] == "pepe@gmail.com" && $request->getParsedBody()["clave"] == "123456" ) {
      $response = $next($request, $response);
      $response->write("  Se logeo  ");
    }else {
      $response->write("  Email o Clave incorrecto  ");
    }
    $response->write("  despues  ");
    return $response;
  } */
    $response->write("  antes  ");

    if(Autentic::validarClave($request->getHeader("token")[0])) {
      $response = $next($request, $response);
      $response->write("  Se logeo  ");
    }else {
      $response->write("  Email o Clave incorrecto  ");
    }

    $response->write("  despues  ");

  return $response;
 }
}
?>
