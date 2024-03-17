<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once (__DIR__.'/../Dispositivo_di_allarme.php');
require_once (__DIR__.'/../impianto.php');
require_once __DIR__ . '/../c.php';
require_once __DIR__ . '/../Rilevatore_di_pressione.php';
require_once __DIR__ . '/../Rilevatore_di_umidita.php';
class RilevatoreController {
    public function index(Request $request, Response $response, $args) {
        $rilevatore = new c();
        $message = $rilevatore->jsonrilevatore();
        $response->getBody()->write(json_encode($message));
        return $response;
    }
    public function rilevatore(Request $request, Response $response, $args)
    {
        $identificativo = $args['identificativo'];
        $dispositivoss = new c();
        $dispositivo = $dispositivoss->getRilevatore($identificativo);

        if ($dispositivo) {
            $response->getBody()->write(json_encode($dispositivo));
        } else {
            $response->getBody()->write("rilevatore di pressione non trovato");
        }

        return $response;
    }
    public function misurazioni(Request $request, Response $response, $args) {
        $identificativo = $args['identificativo'];
        $dispositivoss = new c();
        $rilevatore = $dispositivoss->getRilevatore($identificativo);

        if ($rilevatore) {
            $misurazioni = $rilevatore->getMisurazioni();
            $response->getBody()->write(json_encode($misurazioni));
        } else {
            $response->getBody()->write("Rilevatore di pressione non trovato");
        }

        return $response;
    }
    public function getMisurazioniMaggioreDi(Request $request, Response $response, $args) {
        $identificativo = $args['identificativo'];
        $valore_minimo = $args['valore_minimo'];
        $rilevatores = new c();
        $rilevatore = $rilevatores->getRilevatore($identificativo);

        if ($rilevatore) {
            $misurazioni = $rilevatore->getMisurazioniMaggioreDi($valore_minimo);
            if (empty($misurazioni)) {
                $response->getBody()->write("Il valore minimo fornito è troppo basso");
            } else {
                $response->getBody()->write(json_encode($misurazioni));
            }
        } else {
            $response->getBody()->write("Rilevatore di pressione non trovato");
        }

        return $response;
    }
}