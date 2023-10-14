<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\GalleryModel;

class Api extends BaseController
{
    protected $blogModel = null;
    protected $galleryModel = null;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->galleryModel = new GalleryModel();
    }

    public function getCategory($seo){
        $limit = 10;
        $page = (isset($_GET['page']) ? $_GET['page'] : 1);
        $start = ($page - 1) * $limit;

        $category_data = $this->blogModel->getCategory($seo);
        $blogs = $this->blogModel->getBlogs([
            'category_seo' => $seo,
            'start' => $start,
            'limit' => $limit
        ]);

        return $this->response->setJSON([
            'category_data' => $category_data,
            'blogs' => $blogs
        ]);
    }

    public function getBlogsSameCategory($seo){
        $limit = 10;
        $page = (isset($_GET['page']) ? $_GET['page'] : 1);
        $start = ($page - 1) * $limit;

        $category_id = $this->blogModel->getCategoryID($seo);
        $results = $this->blogModel->getBlogs([
            'category_id' => $category_id,
            'start' => $start,
            'limit' => $limit
        ]);

        return $this->response->setJSON([
            'error' => false,
            'response' => $results
        ]);
    }

    public function getCategories()
    {
        $results = $this->blogModel->getCategories();

        return $this->response->setJSON([
            'error' => false,
            'response' => $results
        ]);
    }

    public function getGallery()
    {
        $gallery = $this->galleryModel->getGallery();

        return $this->response->setJSON([
            'error' => false,
            'response' => $gallery
        ]);
    }

    public function getBlog($seo)
    {
        $blogData = $this->blogModel->getBlog($seo);

        if (!$blogData) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Blog bulunamadı!',
                'redirect' => base_url()
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => $blogData
        ]);
    }

    public function getBlogStarred()
    {
        $blogData = $this->blogModel->getBlogStarred();

        return $this->response->setJSON([
            'error' => false,
            'response' => $blogData
        ]);
    }

    public function getBlogsLastest()
    {
        $limit = (isset($_GET['limit']) ? $_GET['limit'] : 10);
        $page = (isset($_GET['page']) ? $_GET['page'] : 1);
        $start = ($page - 1) * $limit;

        $ignore = isset($_GET['ignore']) ? $_GET['ignore'] : 0;

        $blogs = $this->blogModel->getBlogs([
            'start' => $start,
            'limit' => $limit,
            'ignore' => $ignore
        ]);

        return $this->response->setJSON([
            'error' => false,
            'response' => $blogs
        ]);
    }

    public function getBlogsSimilar($seo)
    {
        $limit = 10;
        $page = (isset($_GET['page']) ? $_GET['page'] : 1);
        $start = ($page - 1) * $limit;

        $blogs = $this->blogModel->getBlogs([
            'start' => $start,
            'limit' => $limit,
            'category_seo' => $seo
        ]);

        return $this->response->setJSON([
            'error' => false,
            'response' => $blogs
        ]);
    }
}
