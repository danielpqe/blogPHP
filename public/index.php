<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
include_once '../config.php';

$route=$_GET['route'] ?? '/';

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();
$router->get('/',function () use ($pdo){

$query=$pdo->prepare('select * from blog_posts');
$query->execute();
$blogposts=$query->fetchAll();

include '../views/index.php';

});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$route);

echo $response;