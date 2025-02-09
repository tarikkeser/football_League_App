<?php

require_once(__DIR__ . "/../../controllers/StatisticsController.php");


Route::add('/statistics', function() {
    $controller = new StatisticsController();
    $controller->getAllStatistics();
});