<?php
namespace App\Controllers\Errors;
use App\Controllers\BaseController;
use App\Controllers\LayoutController;

class Errors extends BaseController {
    private $layout = null;
    
    public function __construct()
    {
        $this->layout = new LayoutController();
    }

    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        
        return view('errors/html/error_404', $data);
    }
}