<?php

require_once(__DIR__ . "/BaseModel.php");

class PlayerModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    // get all player information from the database.
    public function getPlayerByTeamId($teamId)
    {
        $sql = "
                SELECT * 
                FROM players 
                WHERE team_id = :team_id
            ";
        $statement = self::$pdo->prepare($sql);
        $statement->execute(['team_id' => $teamId]);
     
        $players = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($players as &$player) {
            $player['position'] = ucfirst($player['position']); 
            $player['foot'] = ucfirst($player['foot']); 
        }

        return $players;
    }

    // get player by playerid
    public function getPlayerById($playerId)
    {
        $sql = "SELECT * FROM players WHERE id = :id";
        $statement = self::$pdo->prepare($sql);
        $statement->execute(['id' => $playerId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addPlayer($teamId, $playerData)
    {
        $sql = "
            INSERT INTO players (team_id, name, position, nationality, foot)
            VALUES (:team_id, :name, :position, :nationality, :foot)
        ";
        $statement = self::$pdo->prepare($sql);
        return $statement->execute([
            'team_id' => $teamId,
            'name' => $playerData['name'],
            'position' => $playerData['position'],
            'nationality' => $playerData['nationality'],
            'foot' => $playerData['foot']
        ]);
    }

    public function updatePlayer($playerId, $playerData)
    {
        $sql = "
            UPDATE players
            SET name = :name, position = :position, nationality = :nationality, foot = :foot
            WHERE id = :id
        ";
        $statement = self::$pdo->prepare($sql);
        return $statement->execute([
            'id' => $playerId,
            'name' => $playerData['name'],
            'position' => $playerData['position'],
            'nationality' => $playerData['nationality'],
            'foot' => $playerData['foot']
        ]);
    }

    public function deletePlayer($playerId)
    {
        $sql = "DELETE FROM players WHERE id = :id";
        $statement = self::$pdo->prepare($sql);
        return $statement->execute(['id' => $playerId]);
    }
}
