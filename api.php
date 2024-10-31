<?php

namespace machine\api;
use app\service\ClientService;
use machine\src\controller\ClientController;
use app\service\ProductService;
use machine\src\controller\ProductController;
use app\service\SpecialistService;
use machine\src\controller\SpecialistController;

require_once(dirname(__DIR__) . '/machine/bootstrap.php');

$method = $_REQUEST['method'];
$act = $_REQUEST['act'];
$entityManager = getEntityManager();
$_REQUEST = array_merge($_REQUEST, json_decode(file_get_contents('php://input')));
function getController($act,$entityManager)
{

    $controller = match ($_REQUEST['act']) {
        'Client' => new ClientController(new СlientService($entityManager)),
        'Product' => new ProductController(new ProductService($entityManager)),
        'Specialist' => new SpecialistController(new SpecialistService($entityManager)),
        default => throw new Exception("Unknown act: $act", 404)
    };
    return $controller;
}

$controller=getController($act,$entityManager);
if (method_exists($controller, $method)) {

    return $controller->{$method}($_REQUEST);
} else {
    throw new Exception("Unknown method: $method", 404);
}
