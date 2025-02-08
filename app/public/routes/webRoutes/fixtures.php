<?php

require_once(__DIR__ . "/../controllers/FixtureController.php");


Route::add('/fixtures', function() {
    $controller = new FixtureController();
    $controller->getFixture();
});