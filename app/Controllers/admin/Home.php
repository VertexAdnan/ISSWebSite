<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;
use App\Models\CustomerModel;

class Home extends BaseController {
    protected $layout = null;
    protected $customerModel = null;
    public function __construct()
    {  
       $this->layout = new LayoutAdmin(); 
       $this->customerModel = new CustomerModel(); 
    }
    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        $data['totalAccounts'] = $this->customerModel->getTotalAccounts();
        $data['totalAccountsBanned'] = $this->customerModel->getTotalAccounts(200);
        $data['totalChars'] = $this->customerModel->getTotalChars();
        $data['totalDevelopers'] = $this->customerModel->totalDevelopers();
        $data['lastAccounts'] = $this->customerModel->getLastAccounts();
        $data['accountsBanned'] = $this->customerModel->getLastAccounts(5, 200);

        return view('admin/index', $data);
    }
}