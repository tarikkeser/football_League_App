<?php
require_once(__DIR__ . "/../models/TeamModel.php");

class TeamService {
    private $teamModel;

    public function __construct() {
        $this->teamModel = new TeamModel();
    }

    public function getAllTeams() {
        return $this->teamModel->getAllTeams();
    }
    public function getTeamByTeamId($teamId) {
        return $this->teamModel->getTeamByTeamId($teamId);
    }

    public function updateTeamStats($id,$points, $goals_scored, $goals_conceded) {
        return $this->teamModel->updateTeamStats($id,$points, $goals_scored, $goals_conceded);
    }
    public function addTeam($team){
        
        return $this->teamModel->addTeam($team);
    }
    public function deleteTeam($teamId){
        return $this->teamModel->deleteTeam($teamId);
    }
}