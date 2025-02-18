<?php
require_once(__DIR__ . "/../../service/PlayerService.php");

class ApiPlayerController
{
    private $playerService;

    public function __construct()
    {
        $this->playerService = new PlayerService();
    }
    public function getPlayerByTeamId($teamId)
    {
        $players = $this->playerService->getPlayerByTeamId($teamId);
        echo json_encode($players);
    }
    public function getPlayerById($playerId){
        $player = $this->playerService->getPlayerById($playerId);
        echo json_encode($player);
    }
    public function addPlayer($teamId)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->playerService->addPlayer($teamId, $data);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Add failed']);
        }
    }
    public function updatePlayer($playerId)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->playerService->updatePlayer($playerId, $data);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Update failed']);
        }
    }
    public function deletePlayer($playerId){
        $result = $this->playerService->deletePlayer($playerId);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Delete failed']);
        }
    }
}
