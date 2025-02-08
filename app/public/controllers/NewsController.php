<?php

require_once(__DIR__ . '/../models/NewsModel.php');

class NewsController{

    private $newsModel;
    //constructor to initialize new model. 
    public function __construct(){
        $this->newsModel = new NewsModel();
    }
    public function getAllNews(){
        $news= $this->newsModel->getAllNews();// get data from model.
        require(__DIR__ . "/../views/pages/news.php");
    }
}