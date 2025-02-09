<?php

require_once(__DIR__ . "/BaseModel.php");

class FixtureModel extends BaseModel
{
    public function __construct(){
        parent::__construct();
    }

    public function getFixture(){
        $sql = "SELECT 
                    f.id,
                    f.match_date, 
                    f.status,
                    f.home_team_score,
                    f.away_team_score,
                    t1.name AS home_team, 
                    t1.stadium_name AS home_team_stadium,   
                    t2.name AS away_team
                FROM fixtures f
                JOIN teams t1 ON f.home_team_id = t1.id
                JOIN teams t2 ON f.away_team_id = t2.id
                ORDER BY f.match_date ASC";
        
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update Match.
    public function updateMatch($matchId, $homeScore, $awayScore, $status) {
        $sql = "UPDATE fixtures 
                SET home_team_score = :home_score, 
                    away_team_score = :away_score, 
                    status = :status
                WHERE id = :match_id";
    
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute([
            "home_score" => $homeScore,
            "away_score" => $awayScore,
            "status" => $status,
            "match_id" => $matchId
        ]);
    }
}
