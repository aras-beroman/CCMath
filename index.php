<?php

require __DIR__.'./vendor/autoload.php';

use App\Controllers\CarsController;
use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;
use App\Controllers\HomeController;

Router::get('/', function () {
    (new HomeController())->index();
});

Router::get('/cars', function (Request $request, Response $response) {
    $result = ((new CarsController())->index());

    if (is_string($result) && strpos($result, 'Error') !== false) {
        return $response->sendError($result);
    }

    return $response->sendResponse($result);
});

Router::get('/cars-by-band', function (Request $request, Response $response) {
    $result = ((new CarsController())->index(true));

    if (is_string($result) && strpos($result, 'Error') !== false) {
        return $response->sendError($result);
    }

    return $response->sendResponse($result);
});

Router::post('/store/car', function (Request $request) {
    (new CarsController())->store($request);
});

Router::post('/delete/car', function (Request $request) {
    (new CarsController())->delete($request->get('id'));
});


