<?php

require_once(__DIR__ . "/../controllers/NewsController.php");


Route::add('/news', function() {
    $controller = new NewsController();
    $controller->getAllNews();
});