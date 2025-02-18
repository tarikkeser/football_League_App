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
        $sql = "SELECT id, logo, name, points, goals_scored, goals_conceded FROM teams ORDER BY points DESC, goals_scored DESC, goals_conceded ASC";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // get team information by team id from the database.
    public function getTeamByTeamId($teamId)
    {
        $sql = "SELECT name, points, goals_scored, goals_conceded FROM teams WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['id' => $teamId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // update team stats
    public function updateTeamStats($id, $points, $goals_scored, $goals_conceded)
    {
        $sql = "UPDATE teams SET points = :points, goals_scored = :goals_scored, goals_conceded = :goals_conceded WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute(['points' => $points, 'goals_scored' => $goals_scored, 'goals_conceded' => $goals_conceded, 'id' => $id]);
    }
    // add new team to the database.
    public function addTeam($team)
    {
        
        $sql = "INSERT INTO teams (name, points, goals_scored, goals_conceded) VALUES (:name,:points,:goals_scored,:goals_conceded)";
        $statement = self::$pdo->prepare($sql);
        return $statement->execute(['name' => $team['name'], 'points' => $team['points'], 'goals_scored' => $team['goals_scored'], 'goals_conceded' => $team['goals_conceded']]);  
        
    }
    // delete team from the database.
    public function deleteTeam($teamId)
    {
        $sql = "DELETE FROM teams WHERE id = :id";
        $statement = self::$pdo->prepare($sql);
        return $statement->execute(['id' => $teamId]);
    }
}
