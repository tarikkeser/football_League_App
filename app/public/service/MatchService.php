<?php
require_once(__DIR__ . "/../models/MatchModel.php");
class MatchService
{
    private $matchModel;

    public function __construct()
    {
        $this->matchModel = new MatchModel();
    }

    public function getAllMatches()
    {
        return $this->matchModel->getAllMatches();
    }

    public function getMatchById($matchId)
    {
        return $this->matchModel->getMatchById($matchId);
    }


    public function updateMatchScore($id, $homeScore, $awayScore, $played) {
        return $this->matchModel->updateMatchScore($id, $homeScore, $awayScore, $played);
    }
    
    public function resetMatch($id) {
        return $this->matchModel->resetMatch($id);
    }

}
