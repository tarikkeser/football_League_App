<?php
// Web Routes


require_once(__DIR__ . "../../controllers/web/WebHomePageController.php");
require_once(__DIR__ . "../../controllers/web/WebTeamController.php");
require_once(__DIR__ . "../../controllers/web/LoginController.php");
require_once(__DIR__ . "../../controllers/web/WebPlayerController.php");

// Show Login Page
Route::add('/login', function () {
    require(__DIR__ . '/../views/pages/login.php');
}, 'get');

// Login Process
Route::add('/login_process', function () {
    $controller = new LoginController();
    $controller->login(); //
}, 'post');

// Logout 
Route::add('/logout', function () {
    $controller = new LoginController();
    $controller->logout();
}, 'get');

// Show Homepage 
Route::add('/', function () {
    $controller = new HomePageController();
    $controller->showHomePage();
}, 'get');

// Show League Standings Page
Route::add('/leaguestandings', function () {
    $controller = new TeamController();
    $controller->showStandingsPage();
    'get';
});
//players page
Route::add('/players', function () {
    $controller= new PlayerController();
    $controller->showPlayersPage();
    'get';  
});
// news page
// gallery page

