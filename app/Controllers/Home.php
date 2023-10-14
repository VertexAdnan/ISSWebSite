<?php
namespace App\Controllers;
use App\Models\CustomerModel;
use App\Controllers\LayoutController;
use App\Models\NewsModel;
use App\Models\BannersModel;

class Home extends BaseController
{
    protected $newsModel = null;
    protected $bannersModel = null;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->bannersModel = new BannersModel();    
    }

    public function index()
    {
        $session = session();
        
        $data['logged_in'] = $session->get('customer_id') ? $session->get('customer_id') : false;
        $data['is_premium'] = $session->get('premium') ? $session->get('premium') : false;

        $layout = new LayoutController();
        $data['header'] = $layout->renderHeader();
        $data['footer'] = $layout->renderFooter();
        $banners = $this->bannersModel->buildBanners();
        $data['news'] = $this->newsModel->getNews();
        $data['banners'] = $banners['banners'];
        $data['mainBanner'] = $banners['main'];
        
        return view('site/index', $data);
    }
}
