<?php

require_once(__DIR__ . "/BaseModel.php");

class GalleryModel extends BaseModel{
    public function __construct(){
        parent::__construct();
    }
    public function getAllImages(){
        $sql = "SELECT id, image_url FROM gallery";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function addImage($image_url){
        $sql = "INSERT INTO gallery (image_url) VALUES (:image_url)";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute(['image_url' => $image_url]);
    }
    public function deleteImage($id){
        $sql = "DELETE FROM gallery WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
