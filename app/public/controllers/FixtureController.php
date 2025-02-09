<?php

require_once(__DIR__ . '/../models/FixtureModel.php');

class FixtureController{
    private $fixtureModel;

    //constructor
    public function __construct(){
        $this->fixtureModel = new FixtureModel();
    }

    //returns json for API.
    public function getFixtureApi() {
        $fixtures = $this->fixtureModel->getFixture();
        header("Content-Type: application/json");
        echo json_encode($fixtures, JSON_UNESCAPED_UNICODE);
        exit();
    }
    // returns HTML page.
    public function showFixturePage(){
        $fixtures = $this->fixtureModel->getFixture();
        $weeklyFixtures = $this->getFixtureByWeek($fixtures);
        require(__DIR__ . '/../views/pages/fixtures.php');
    }

    /* we can create service/logic layer for methods, but for now I keep it here. */
    // logic to get fixture by week.
    public function getFixtureByWeek($fixtures){
        $weeklyFixtures = [];

        foreach ($fixtures as $fixture) {
            
            $matchDate = new DateTime($fixture['match_date']);
            $week = $matchDate->format('W');
            $weeklyFixtures[$week][] = $fixture;
        }
    
        return $weeklyFixtures;
    }
    // Update Match.
    public function updateMatch() {
        // POST verilerini al
        $matchId = $_POST['match_id'] ?? null;
        $homeScore = $_POST['home_score'] ?? null;
        $awayScore = $_POST['away_score'] ?? null;
        $status = $_POST['status'] ?? null;
    
        // Eksik parametre kontrolü
        if (!$matchId || $homeScore === null || $awayScore === null || !$status) {
            http_response_code(400);
            echo json_encode(["error" => "Eksik parametreler"]);
            exit();
        }
    
        // Güncelleme işlemi
        $success = $this->fixtureModel->updateMatch($matchId, $homeScore, $awayScore, $status);
    
        if ($success) {
            echo json_encode(["message" => "Maç başarıyla güncellendi"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Güncelleme başarısız"]);
        }
    }
    
}
    