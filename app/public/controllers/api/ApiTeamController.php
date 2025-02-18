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
    public function updateTeamStats($teamId)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->teamService->updateTeamStats(
            $teamId,
            $data['points'],
            $data['goals_scored'],
            $data['goals_conceded']
        );

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Update failed']);
        }
    }
    public function addTeam()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->teamService->addTeam($data);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Add failed']);
        }
    }
    public function deleteTeam($teamId){
        $result = $this->teamService->deleteTeam($teamId);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Delete failed']);
        }
    }

}
