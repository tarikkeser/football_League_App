<?php

require_once(__DIR__ . '/../models/FixtureModel.php');

class FixtureController{
    private $fixtureModel;

    public function __construct(){
        $this->fixtureModel = new FixtureModel();
    }
    public function getFixture(){
        $fixtures = $this->fixtureModel->getFixture(); // get data from model.
        $weeklyFixtures = $this->getFixtureByWeek($fixtures); // group fixtures by week.
        require(__DIR__ . '/../views/pages/fixtures.php');
    }

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
}
    