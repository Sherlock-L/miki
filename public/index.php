<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

$app = new Application();

$app->get('/', function (Request $request) use ($app) {
    $name = $request->get('name');
    return 'hello ' . $name;
});

$db = new \medoo(
    [
        'database_type' => 'mysql',
        'database_name' => 'tony',
        'server'        => 'localhost',
        'username'      => 'root',
        'password'      => '123456',
        'charset'       => 'utf8',
    ]);

\Miki\Model\Model::setDb($db);

$app->get('/{controller}/{action}', function ($controller, $action, Request $request) use ($app) {
    $controller = '\\Miki\\Controller\\' . $controller . 'Controller';
    $action     = $action . 'Action';
    $controller = new $controller();
    return $controller->$action($request);
});

$app->run();