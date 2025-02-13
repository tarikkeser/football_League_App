<?php
require_once(__DIR__ . "/../../service/TeamService.php");

class ApiTeamController
{
    private $teamService;

    public function __construct()
    {
        $this->teamService = new TeamService();
    }

    public function getAllTeams()
    {
        $teams = $this->teamService->getAllTeams();
        echo json_encode($teams);
    }
    public function getTeamByTeamId($teamId)
    {
        $team = $this->teamService->getTeamByTeamId($teamId);
        echo json_encode($team);
    }
    public function updateTeamStats()
    {
    }
}
