<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/web.php';


use ibrahim\Http\Route;
use ibrahim\Http\Request;
use ibrahim\Http\Response;

$routes = new Route(new Request, new Response);

$routes->resolve();

