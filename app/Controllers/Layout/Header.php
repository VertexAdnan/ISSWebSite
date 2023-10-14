<?php
namespace App\Controllers\Layout;
use App\Controllers\BaseController;

class Header extends BaseController {
    public function render($data = []){
        return view('layout/header', $data);
    }
}