<?php
require_once(__DIR__ . "/../models/NewsModel.php");


class NewsService {
    private $newsModel;
    public function __construct() {
        $this->newsModel = new NewsModel();
    }
    public function getAllNews() {
        return $this->newsModel->getAllNews();
    }
    public function createNews($title, $content) {
        return $this->newsModel->createNews($title, $content);
    }
    public function deleteNews($id) {
        return $this->newsModel->deleteNews($id);
    }
}