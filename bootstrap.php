<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src'],
    isDevMode: true,
);

$conn = [
    'servername' => 'localhost',
    'username' => 'root',
    'password' => ' ',
    'dbname' => 'magazin',
];

$entityManager = new EntityManager($conn, $config);
var_dump($entityManager);
die;
