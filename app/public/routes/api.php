<?php
require_once(__DIR__ . "/../controllers/api/ApiTeamController.php");


Route::add('/api/standings', function() {
    $controller = new ApiTeamController(); 
    $controller->getAllTeams();
}, 'get');

//update team stats
Route::add('/api/update_stats', function() {
    $controller = new ApiTeamController(); 
    $controller->updateTeamStats();
}, 'post');

//add new team
