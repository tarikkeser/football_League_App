<?php


require_once(__DIR__ . '/../models/TeamModel.php');

class TeamController {

    private $teamModel;

    // Constructor
    public function __construct() {
        $this->teamModel = new TeamModel();
    }

    // Returns JSON for API
    public function getAllTeamsAPI() {
        return $this->teamModel->getAllTeams(); 
    }

    // HTML page
    public function showStandingsPage() {
        include(__DIR__ . '/../views/pages/leaguestandings.php'); // HTML sayfası
    }
}
