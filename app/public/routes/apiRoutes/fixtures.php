<?php
require_once(__DIR__ . "/../../controllers/FixtureController.php");

$controller = new FixtureController(); 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->getFixtureApi();
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->updateMatch();
} else {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
