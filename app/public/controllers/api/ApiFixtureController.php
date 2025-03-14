<?php
require_once(__DIR__ . "/../../service/MatchService.php");

class ApiFixtureController{
    private $fixtureService;


    // constructor
    public function __construct()
    {
        $this->fixtureService = new MatchService();
    }
    public function getAllMatches()
    {
        $matches=$this->fixtureService->getAllMatches();
        echo json_encode($matches);
    }
    public function getMatchById($id)
    {
        $match = $this->fixtureService->getMatchById($id);
        echo json_encode($match);
    }
    public function updateMatchScore($id, $homeScore, $awayScore, $played) {
        $result = $this->fixtureService->updateMatchScore($id, $homeScore, $awayScore, $played);
        
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Update failed']);
        }
    }
    public function resetMatch($id) {
        $result = $this->fixtureService->resetMatch($id);
        
        header('Content-Type: application/json');
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Match reset successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Reset failed', 'message' => 'Failed to reset match']);
        }
    }

}