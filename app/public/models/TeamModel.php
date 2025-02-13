<?php

require_once(__DIR__ . "/BaseModel.php");

class TeamModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // get all team information from the database.
    public function getAllTeams()
    {
        $sql = "SELECT logo, name, points, goals_scored, goals_conceded FROM teams ORDER BY points DESC, goals_scored DESC, goals_conceded ASC";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    
    }
    public function getTeamByTeamId($teamId){
        $sql = "SELECT * FROM teams WHERE id = :teamId";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['teamId' => $teamId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // update team stats
    public function updateTeamStats($id,$points, $goals_scored, $goals_conceded)
    {
        $sql = "UPDATE teams SET points = :points, goals_scored = :goals_scored, goals_conceded = :goals_conceded WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute(['points' => $points, 'goals_scored' => $goals_scored, 'goals_conceded' => $goals_conceded, 'id' => $id]);
    }
}
