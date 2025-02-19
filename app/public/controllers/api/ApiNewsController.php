<?php
require_once(__DIR__ . "/../../service/NewsService.php");

class ApiNewsController
{
    private $newsService;
    public function __construct()
    {
        $this->newsService = new NewsService();
    }
    public function getAllNews()
    {
        $news = $this->newsService->getAllNews();
        echo json_encode($news);
    }
    public function createNews()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->newsService->createNews($data['title'], $data['content']);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Create failed']);
        }
    }
    public function deleteNews($id)
    {
        $result = $this->newsService->deleteNews($id);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Delete failed']);
        }
    }
}
