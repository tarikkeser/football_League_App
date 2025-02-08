<?php

require_once(__DIR__ . "/../controllers/HomePageController.php");


Route::add('/', function () {
    $controller = new HomePageController();
    $controller->showHomePage(); 
});

