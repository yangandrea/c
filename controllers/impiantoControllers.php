<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../impianto.php';

class impiantoControllers
{
    function index(request $request, Response $response, $args)
    {
        $impianto = new c();
        $message = $impianto->jsonimpianto();
        $response->getBody()->write(json_encode($message));
        return $response;
    }
}