<?php


require_once(__DIR__ . "/../../controllers/TeamController.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller = new TeamController();
    echo json_encode($controller->getAllTeamsAPI());
} else {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
