<?php

require_once(__DIR__ . '/../models/Statistics.php');



class StatisticsController {
    private $statisticModel;

    public function __construct() {
        $this->statisticModel = new Statistics();
    }
    public function getAllStatistics() {
        $statistics = $this->statisticModel->getAllStatistics();
        require(__DIR__ . '/../views/pages/statistics.php');
    }
}

