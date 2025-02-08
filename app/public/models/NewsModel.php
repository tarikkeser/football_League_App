<?php

require_once(__DIR__ . "/BaseModel.php");

class NewsModel extends BaseModel {
    public function __construct(){
        parent::__construct();
    }

    public function getAllNews(){
        $sql = "SELECT title, content , 'image' FROM news";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
