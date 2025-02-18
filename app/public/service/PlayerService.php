<?php
require_once(__DIR__ . "/../models/PlayerModel.php");

class PlayerService{
    private $playerModel;

    public function __construct() {
        $this->playerModel = new PlayerModel();
    }
    
    public function getPlayerByTeamId($teamId) {
        return $this->playerModel->getPlayerByTeamId($teamId);
    }
    public function getPlayerById($playerId) {
        return $this->playerModel->getPlayerById($playerId);
    }
    public function addPlayer($teamId, $playerData) {
        return $this->playerModel->addPlayer($teamId, $playerData);
    }
    public function updatePlayer($playerId, $playerData) {
        return $this->playerModel->updatePlayer($playerId, $playerData);
    }
    public function deletePlayer($playerId) {
        return $this->playerModel->deletePlayer($playerId);
    }


}