<?php
// Web Routes


require_once(__DIR__ . "../../controllers/web/WebHomePageController.php");
require_once(__DIR__ . "../../controllers/web/WebTeamController.php");
require_once(__DIR__ . "../../controllers/web/LoginController.php");
require_once(__DIR__ . "../../controllers/web/WebPlayerController.php");
require_once(__DIR__ . "../../controllers/web/WebNewsController.php");
require_once(__DIR__ . "../../controllers/web/WebGalleryController.php");
require_once(__DIR__ . "../../controllers/web/WebFixturesController.php");


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
//Show players page
Route::add('/players', function () {
    $controller = new PlayerController();
    $controller->showPlayersPage();
    'get';
});

// Show news page
Route::add('/news', function () {
    $controller = new NewsController();
    $controller->showNewsPage();
}, 'get');

// gallery page
Route::add('/gallery', function () {
    $controller=new GalleryController();
    $controller->showGalleryPage();
}, 'get');

//show fixture page
Route::add('/fixture', function () {
    $controller=new FixtureController();
    $controller->showFixturesPage();
}, 'get');

