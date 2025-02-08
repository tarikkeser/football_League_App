<?php

require_once(__DIR__ . "/BaseModel.php");

class TeamModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

public function getAllTeams(){
    $sql = "SELECT logo, name, points, goals_scored, goals_conceded FROM teams ORDER BY points DESC, goals_scored DESC, goals_conceded ASC";
    $stmt = self::$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
};
