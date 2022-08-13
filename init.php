<?php

include __DIR__.'/vendor/autoload.php';

use Lemon\Http\Middlewares\Cors;
use Lemon\Kernel\Lifecycle;
use Lemon\Protection\Middlwares\Csrf;

$lifecycle = new Lifecycle(__DIR__);

// --- Loading default Lemon services ---
$lifecycle->loadServices();

// --- Loading Zests for services ---
$lifecycle->loadZests();

// --- Loading Error/Exception handlers ---
$lifecycle->loadHandler();

// --- Loading commands ---
$lifecycle->loadCommands();

$lifecycle->get('config')->load();

/** @var \Lemon\Routing\Router $router */
$router = $lifecycle->get('routing');

$router->file('routes.web')
    ->middleware(Csrf::class)
;

$router->file('routes.api')
    ->prefix('api')
    ->middleware(Cors::class)
;

return $lifecycle;
