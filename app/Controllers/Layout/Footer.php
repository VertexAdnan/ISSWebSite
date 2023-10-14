<?php
namespace App\Controllers\Layout;
use App\Controllers\BaseController;

class Footer extends BaseController {
    public function render($data = []){
        return view('layout/footer', $data);
    }
}