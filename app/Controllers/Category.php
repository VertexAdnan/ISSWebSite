<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class Category extends BaseController {
    protected $blog = null;

    public function __construct()
    {
        $this->blog = new BlogModel();    
    }

    public function index($seo){
        $category_title = $this->blog->getCategory($seo);
        $data['header'] = $this->header->render([
            'title' => $category_title['title']
        ]);
        $data['footer'] = $this->footer->render();

        $data['current'] = $seo;
        return view('category', $data);
    }
}