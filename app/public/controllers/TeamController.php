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
        $teams = $this->teamModel->getAllTeams();
        echo json_encode($teams);
    }

    // HTML page
    public function showStandingsPage() {
        include(__DIR__ . '/../views/pages/leaguestandings.php'); // HTML sayfası
    }


    // Some logic methods here for future implementations.
}
