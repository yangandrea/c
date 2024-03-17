<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once (__DIR__.'/../Dispositivo_di_allarme.php');
require_once (__DIR__.'/../impianto.php');
require_once __DIR__ . '/../c.php';

class DispotiviController
{

    public function dispositivi(Request $request, Response $response, $args)
      {
          $rilevatore = new c();
          $message = $rilevatore->jsondispotivi();
          $response->getBody()->write(json_encode($message));
          return $response;
      }

    public function dispositivo(Request $request, Response $response, $args)
    {
        $identificativo = $args['Identificativo'];
        $dispositivos = new c();
        $dispositivo = $dispositivos->getDispositivo($identificativo);

        if ($dispositivo) {
            $response->getBody()->write(json_encode($dispositivo->jsonSerialize()));
        } else {
            $response->getBody()->write("Dispositivo non trovato");
        }

        return $response;
    }

}
