<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;

class Event extends BaseController {
    protected $layout = null;
    public function __construct()
    {  
       $this->layout = new LayoutAdmin(); 
    }
    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        return view('admin/index', $data);
    }
}