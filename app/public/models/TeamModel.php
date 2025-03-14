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
    public function updateTeamStats($team_id, $points, $goals_scored, $goals_conceded)
    {
        // Mevcut takım istatistiklerini al
        $sql = "SELECT points, goals_scored, goals_conceded FROM teams WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['id' => $team_id]);
        $team = $stmt->fetch(PDO::FETCH_ASSOC);

        // Yeni değerleri hesapla
        $new_points = max(0, $team['points'] + $points);
        $new_goals_scored = max(0, $team['goals_scored'] + $goals_scored);
        $new_goals_conceded = max(0, $team['goals_conceded'] + $goals_conceded);

        // Takım istatistiklerini güncelle
        $sql = "UPDATE teams SET points = :points, goals_scored = :goals_scored, goals_conceded = :goals_conceded WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            'points' => $new_points,
            'goals_scored' => $new_goals_scored,
            'goals_conceded' => $new_goals_conceded,
            'id' => $team_id
        ]);
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
