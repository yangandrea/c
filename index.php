<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controllers/impiantoControllers.php';
require_once __DIR__ . '/controllers/DispotiviController.php';
require_once __DIR__ . '/controllers/RilevatoreController.php';
require_once __DIR__ . '/controllers/UmiditaController.php';

$app = AppFactory::create();

$app->get('/impianto', 'impiantoControllers:index');
$app->get('/dispositivi_di_allarme', 'DispotiviController:dispositivi');
$app->get('/dispositivi_di_allarme/{Identificativo}', 'DispotiviController:dispositivo');
$app->get('/rilevatori_di_pressione', 'RilevatoreController:index');
$app->get('/rilevatori_di_pressione/{identificativo}', 'RilevatoreController:rilevatore');
$app->get('/rilevatori_di_pressione/{identificativo}/misurazioni', 'RilevatoreController:misurazioni');
$app->get('/rilevatori_di_pressione/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', 'RilevatoreController:getMisurazioniMaggioreDi');
$app->get('/rilevatori_di_umidita', 'UmiditaController:index');
$app->get('/rilevatori_di_umidita/{identificativo}', 'UmiditaController:Rilevaotore');
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni', 'UmiditaController:Misurazioni');
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', 'UmiditaController:getmisurazioniMaggioreDi');


$app->run();
