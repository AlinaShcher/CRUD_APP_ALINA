<?php

namespace machine\api;
use app\service\ClientService;
use machine\src\controller\clientController;
use app\service\ProductService;
use machine\src\controller\ProductController;
use app\service\SpecialistService;
use machine\src\controller\SpecialistController;

require_once(dirname(__DIR__) . '/machine/bootstrap.php');
$act = $_REQUEST['act'];
$method = $_REQUEST['method'];
$entityManager = getEntityManager();
$_REQUEST = array_merge($_REQUEST, json_decode(file_get_contents('php://input')));

$controller = match ($_REQUEST['act']) {
    'Client' => new сlientController(new СlientService($entityManager)),
    'Product' =>new ProductController(new ProductService($entityManager)),
    'Specialist' => new SpecialistController(new SpecialistService($entityManager)),
    default => throw new Exception("Unknown act: $act", 404)
};

if (method_exists($controller, $method)) {
    return $controller->{$method}($_REQUEST);
} else {
    throw new Exception("Unknown method: $method", 404);
}
