<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Vérifie si l'application est en mode maintenance
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Charge l'autoload de Composer
require __DIR__.'/../vendor/autoload.php';

// Crée l'application Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Récupère le Kernel de l'application
$kernel = $app->make(Kernel::class);

// Gère la requête entrante
$response = $kernel->handle(
    $request = Request::capture()
);

// Envoie la réponse au client
$response->send();

// Termine la requête
$kernel->terminate($request, $response);
