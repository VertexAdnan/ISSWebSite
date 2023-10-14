<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\BlogModel;

class Blog extends BaseController {
    protected $blog = null;

    public function __construct()
    {
        $this->blog = new BlogModel();    
    }

    public function index($seo){
        $data['header'] = $this->header->render([
            'title' => $this->blog->getBlogTitle($seo)
        ]);
        $data['footer'] = $this->footer->render();

        $data['current'] = $seo;
        return view('post', $data);
    }
}