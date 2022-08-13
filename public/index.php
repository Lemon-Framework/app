<?php

use Lemon\Http\Request;

$maintenance = __DIR__.'/../maintenance.php';

if (file_exists($maintenance)) {
    require $maintenance;
    die();
}

/** @var \Lemon\Kernel\Lifecycle $lifecycle */
$lifecycle = include __DIR__.'/../init.php';

$lifecycle->add(Request::class, Request::capture());
$lifecycle->alias('request', Request::class);

$lifecycle->boot();
