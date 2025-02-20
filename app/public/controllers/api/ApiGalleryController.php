<?php
require_once(__DIR__ . "/../../service/GalleryService.php");

class ApiGalleryController
{
    private $galleryService;
    public function __construct()
    {
        $this->galleryService = new GalleryService();
    }
    public function getAllImages()
    {
        $images = $this->galleryService->getAllImages();
        echo json_encode($images);
    }
    public function addImage()
    {
        $result = $this->galleryService->addImage($_FILES);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Add failed']);
        }
    }
    public function deleteImage($imageId)
    {
        $result = $this->galleryService->deleteImage($imageId);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Delete failed']);
        }
    }
}
