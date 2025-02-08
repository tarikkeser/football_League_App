<?php

require_once(__DIR__ . "/../../controllers/TeamController.php");


Route::add('/leaguestandings', function() {
    $controller = new TeamController();
    $controller->showStandingsPage();
});