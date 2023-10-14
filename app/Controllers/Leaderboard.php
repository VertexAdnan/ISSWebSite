<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\LayoutController;
use App\Models\LeaderboardModel;

class Leaderboard extends BaseController {
    protected $model = null;
    
    public function __construct()
    {
        $this->model = new LeaderboardModel();
    }

    public function index(){
        $layout = new LayoutController();

        $data['header'] = $layout->renderHeader();
        $data['footer'] = $layout->renderFooter();
        $data['leader'] = $this->model->getZKBoard();
        
        return view('site/leaderboard', $data);
    }
}