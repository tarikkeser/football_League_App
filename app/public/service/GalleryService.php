<?php
require_once(__DIR__ . "/../models/GalleryModel.php");


class GalleryService
{
    private $galleryModel;
    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
    }
    public function getAllImages()
    {
        return $this->galleryModel->getAllImages();
    }
    public function addImage($file)
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/uploads/';
        
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!isset($file['image']) || $file['image']['error'] !== UPLOAD_ERR_OK) {
            return ['success' => false, 'error' => 'Upload failed'];
        }

        $fileExtension = strtolower(pathinfo($file['image']['name'], PATHINFO_EXTENSION));
        $filename = 'gallery_' . uniqid() . '.' . $fileExtension;
        $filepath = $uploadDir . $filename;
        
        if (move_uploaded_file($file['image']['tmp_name'], $filepath)) {
            $dbPath = '/assets/images/uploads/' . $filename;
            $result = $this->galleryModel->addImage($dbPath);
            
            return $result ? 
                ['success' => true, 'image_url' => $dbPath] : 
                ['success' => false, 'error' => 'Database save failed'];
        }
        
        return ['success' => false, 'error' => 'File move failed'];
    }
    public function deleteImage($id)
    {
        return $this->galleryModel->deleteImage($id);
    }
}
