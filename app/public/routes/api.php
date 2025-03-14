<?php
require_once(__DIR__ . "/../controllers/api/ApiTeamController.php");

require_once(__DIR__ . "/../controllers/api/ApiPlayerController.php");

require_once(__DIR__ . "/../controllers/api/ApiNewsController.php");

require_once(__DIR__ . "/../controllers/api/ApiGalleryController.php");

require_once(__DIR__ . "/../controllers/api/ApiFixtureController.php");





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

// get all matches
Route::add('/api/matches', function() {
    $controller = new ApiFixtureController();
    $controller->getAllMatches();
}, 'get');
// get match by id
Route::add('/api/match/([0-9]+)', function($id) {
    $controller = new ApiFixtureController();
    $controller->getMatchById($id);
}, 'get');

// update matches 
Route::add('/api/match/([0-9]+)/score', function($id) {
    // JSON verilerini okuyoruz
    $requestData = json_decode(file_get_contents('php://input'), true);
    
    $homeScore = $requestData['home_score'];
    $awayScore = $requestData['away_score'];
    $played = $requestData['played'];
    
    $controller = new ApiFixtureController();
    $controller->updateMatchScore($id, $homeScore, $awayScore, $played);
}, 'post');

Route::add('/api/match/([0-9]+)/reset', function($id) {
    $controller = new ApiFixtureController();
    $controller->resetMatch($id);
}, 'post');











