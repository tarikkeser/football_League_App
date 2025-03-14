<?php
require_once(__DIR__ . "/BaseModel.php");
require_once(__DIR__ . "/TeamModel.php");

class MatchModel extends BaseModel {
    private $teamModel;

    public function __construct()
    {
        parent::__construct();
        $this->teamModel = new TeamModel();
    }
    
    // get all matches
    public function getAllMatches()
    {
        $sql = "SELECT m.id, t1.name AS home_team, t2.name AS away_team,
                        m.home_team_score, m.away_team_score, m.played,
                        m.match_date, t1.stadium_name AS stadium
                FROM matches m
                JOIN teams t1 ON m.home_team_id = t1.id
                JOIN teams t2 ON m.away_team_id = t2.id
                ORDER BY m.match_date ASC";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // get match by id 
    public function getMatchById($matchId)
    {
        $sql = "SELECT m.id, t1.name AS home_team, t2.name AS away_team, m.home_team_score, m.away_team_score, m.played
                FROM matches m
                JOIN teams t1 ON m.home_team_id = t1.id
                JOIN teams t2 ON m.away_team_id = t2.id
                WHERE m.id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['id' => $matchId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateMatchScore($id, $home_score, $away_score, $played)
    {
        // Maç bilgilerini al
        $sql = "SELECT home_team_id, away_team_id, played, home_team_score, away_team_score FROM matches WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $match = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($match) {
            $home_team_id = $match['home_team_id'];
            $away_team_id = $match['away_team_id'];
            $previous_played = $match['played'];
            $previous_home_score = $match['home_team_score'];
            $previous_away_score = $match['away_team_score'];
            
            $sql = "UPDATE matches SET home_team_score = :home_score, away_team_score = :away_score, played = :played WHERE id = :id";
            $stmt = self::$pdo->prepare($sql);
            $result = $stmt->execute([
                'home_score' => $home_score, 
                'away_score' => $away_score, 
                'played' => $played, 
                'id' => $id
            ]);
            
            if ($result) {
                // Durum 0'dan 1'e değişiyorsa (maç oynanıyor)
                if ($previous_played == 0 && $played == 1) {
                    $this->updateTeamPoints($home_team_id, $away_team_id, $home_score, $away_score);
                }
                // Durum 1'den 0'a değişiyorsa (maç geri alınıyor)
                else if ($previous_played == 1 && $played == 0) {
                    // Önceki puanları ve golleri geri al
                    $this->revertTeamPoints($home_team_id, $away_team_id, $previous_home_score, $previous_away_score);
                }
                return true;
            }
            return false;
        }
        return false;
    }
    
    // Yeni eklenen fonksiyon - Maçı sıfırlama (0-0 yapma ve takım istatistiklerini geri alma)
    public function resetMatch($id)
    {
        // Maç bilgilerini al
        $sql = "SELECT home_team_id, away_team_id, played, home_team_score, away_team_score FROM matches WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $match = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($match && $match['played'] == 1) {
            $home_team_id = $match['home_team_id'];
            $away_team_id = $match['away_team_id'];
            $previous_home_score = $match['home_team_score'];
            $previous_away_score = $match['away_team_score'];
            
            // Maçı 0-0 olarak güncelle ve played=0 yap
            $sql = "UPDATE matches SET home_team_score = 0, away_team_score = 0, played = 0 WHERE id = :id";
            $stmt = self::$pdo->prepare($sql);
            $result = $stmt->execute(['id' => $id]);
            
            if ($result) {
                // Önceki puanları ve golleri geri al
                $this->revertTeamPoints($home_team_id, $away_team_id, $previous_home_score, $previous_away_score);
                return true;
            }
            return false;
        }
        return false;
    }
    
    private function updateTeamPoints($home_team_id, $away_team_id, $home_score, $away_score)
    {
        $home_points = 0;
        $away_points = 0;
        
        if ($home_score > $away_score) {
            $home_points = 3;  // home team wins
        } elseif ($home_score < $away_score) {
            $away_points = 3;  // away wins
        } else {
            $home_points = 1;  //draw
            $away_points = 1;
        }
        
        $this->teamModel->updateTeamStats($home_team_id, $home_points, $home_score, $away_score);
        $this->teamModel->updateTeamStats($away_team_id, $away_points, $away_score, $home_score);
    }
    
    // Takım puanlarını geri alma metodu
    private function revertTeamPoints($home_team_id, $away_team_id, $home_score, $away_score)
    {
        $home_points = 0;
        $away_points = 0;
        
        if ($home_score > $away_score) {
            $home_points = 3;  // home team won
        } elseif ($home_score < $away_score) {
            $away_points = 3;  // away team won
        } else {
            $home_points = 1;  // draw
            $away_points = 1;  // draw
        }
        
        // Önceki puanları ve golleri çıkar
        $this->teamModel->updateTeamStats($home_team_id, -$home_points, -$home_score, -$away_score);
        $this->teamModel->updateTeamStats($away_team_id, -$away_points, -$away_score, -$home_score);
    }
}