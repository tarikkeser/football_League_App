<?php
require_once(__DIR__ . "/../controllers/api/ApiTeamController.php");

require_once(__DIR__ . "/../controllers/api/ApiPlayerController.php");

require_once(__DIR__ . "/../controllers/api/ApiNewsController.php");

require_once(__DIR__ . "/../controllers/api/ApiGalleryController.php");



// league standings 
Route::add('/api/standings', function() {
    $controller = new ApiTeamController(); 
    $controller->getAllTeams();
}, 'get');

// show single team
Route::add('/api/team/([0-9]+)', function($teamId) {
    $controller = new ApiTeamController();
    $controller->getTeamByTeamId($teamId);
}, 'get');

// update team stats.
Route::add('/api/team/([0-9]+)', function($teamId) {
    $controller = new ApiTeamController();
    $controller->updateTeamStats($teamId);
}, 'put');

// add new team
Route::add('/api/team', function() {
    $controller = new ApiTeamController();
    $controller->addTeam();
}, 'post');

// delete team
Route::add('/api/team/([0-9]+)', function($teamId) {
    $controller = new ApiTeamController();
    $controller->deleteTeam($teamId);
}, 'delete');

// get players
Route::add('/api/team/([0-9]+)/players', function($teamId) {
    $controller = new ApiPlayerController();
    $controller->getPlayerByTeamId($teamId);
}, 'get');

//get single player
Route::add('/api/player/([0-9]+)', function($playerId) {
    $controller = new ApiPlayerController();
    $controller->getPlayerById($playerId);
}, 'get');

// add new player
Route::add('/api/team/([0-9]+)/player', function($teamId) {
    $controller = new ApiPlayerController();
    $controller->addPlayer($teamId);
}, 'post');

// update player
Route::add('/api/player/([0-9]+)', function($playerId) {
    $controller = new ApiPlayerController();
    $controller->updatePlayer($playerId);
}, 'put');

// delete player
Route::add('/api/player/([0-9]+)', function($playerId) {
    $controller = new ApiPlayerController();
    $controller->deletePlayer($playerId);
}, 'delete');

// get news
Route::add('/api/news', function() {
    $controller = new ApiNewsController();
    $controller->getAllNews();
}, 'get');

// create new news
Route::add('/api/news', function() {
    $controller = new ApiNewsController();
    $controller->createNews();
}, 'post');

// delete news
Route::add('/api/news/([0-9]+)', function($newsId) {
    $controller = new ApiNewsController();
    $controller->deleteNews($newsId);
}, 'delete');

// gallery routes
Route::add('/api/gallery', function() {
    $controller = new ApiGalleryController();
    $controller->getAllImages();
}, 'get');

// add new image
Route::add('/api/gallery', function() {
    $controller = new ApiGalleryController();
    $controller->addImage();
}, 'post');

// delete image
Route::add('/api/gallery/([0-9]+)', function($imageId) {
    $controller = new ApiGalleryController();
    $controller->deleteImage($imageId);
}, 'delete');










