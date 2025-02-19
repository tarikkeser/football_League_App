<?php

require_once(__DIR__ . "/BaseModel.php");

class NewsModel extends BaseModel {
    public function __construct(){
        parent::__construct();
    }

    public function getAllNews(){
        $sql = "SELECT id,title, content, publish_date FROM news";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function createNews($title, $content){
        $sql = "INSERT INTO news (title, content, publish_date) VALUES (:title, :content, :publish_date)";
        $stmt = self::$pdo->prepare($sql);
        $publish_date = date('Y-m-d H:i:s');
        return $stmt->execute([
            'title' => $title,
            'content' => $content,
            'publish_date' => $publish_date
        ]);
    }
    public function deleteNews($id){
        $sql = "DELETE FROM news WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
