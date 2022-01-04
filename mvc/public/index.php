<?php

use Lucas\Mvc\Main\Application;
use Lucas\Mvc\Controllers\ExerciseController;

require_once __DIR__ . "/../vendor/autoload.php";

define("BASE_URL", "http://localhost:8080");

$exerciseController = new ExerciseController();

$application = new Application(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD']
);

$application
    ->addRoute("GET", "/", $exerciseController->index(...))
    ->addRoute("GET", "/exercises", $exerciseController->exercises(...))
    ->run();
