<?php

require_once(__DIR__ . "/BaseModel.php");


class Statistics extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }


public function getAllStatistics()
{

    $sql = "SELECT p.name, p.position, p.goals, p.assists, t.name AS team_name 
            FROM players p
            JOIN teams t ON p.team_id = t.id
            ORDER BY p.name ASC";
    $stmt = self::$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
}
