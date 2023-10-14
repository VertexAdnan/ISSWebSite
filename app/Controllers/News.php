<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\LayoutController;
use App\Models\NewsModel;

class News extends BaseController {
    protected $newsModel = null;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function index(){
        $layout = new LayoutController();

        $data['header'] = $layout->renderHeader();
        $data['footer'] = $layout->renderFooter();

        return view('site/news', $data);
    }

    public function getNews($page){
        $limit = 3;
        $offset = ($page - 1) * $limit;
        $results = $this->newsModel->getNews($offset, $limit);

        return $this->response->setJSON($results);
    }
}