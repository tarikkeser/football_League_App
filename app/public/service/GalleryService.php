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
    public function addImage($image_url)
    {
        return $this->galleryModel->addImage($image_url);
    }
    public function deleteImage($id)
    {
        return $this->galleryModel->deleteImage($id);
    }
}
