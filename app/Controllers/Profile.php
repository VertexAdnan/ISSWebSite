<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\LayoutController;
use App\Models\CustomerModel;
use App\Models\CouponModel;

class Profile extends BaseController {
    protected $session = null;
    protected $layout = null;
    protected $customerModel = null;
    protected $couponModel = null;

    public function __construct(){
        $this->session = session();
        $this->layout = new LayoutController();
        $this->customerModel = new CustomerModel();
        $this->couponModel = new CouponModel();

        if(!$this->session->get('CustomerID')){
            redirect('/');
        }
    }

    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        return view('panel/index', $data);
    }

    public function settings(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        return view('panel/settings', $data);
    }

    public function useCoupon(){
        $customer_id = $this->session->get('CustomerID');
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['usedCoupons'] = $this->couponModel->getCouponsUsed($customer_id);
        return view('panel/coupon', $data);
    }

    public function handleUseCoupon(){
        $coupon = isset($_POST['coupon']) ? $_POST['coupon'] : 0;

        if(!$coupon){
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz kupon!'
            ]); 
        }

        $customer_id = $this->session->get('CustomerID');
        
        $use = $this->couponModel->useCoupon($coupon, $customer_id);

        if(!$use){
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz Kupon!'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'Kupon Başarıyla Kullanıldı!'
        ]);
    }

    public function handleChangePassword(){
        $curPass = isset($_POST['curPass']) ? $_POST['curPass'] : 0;
        $newPass = isset($_POST['newPass']) ? $_POST['newPass'] : 0;

        if(!$curPass || !$newPass){
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz Veri!'
            ]);
        }

        $customer_id = $this->session->get('CustomerID');

        $update = $this->customerModel->changePassword($customer_id, $newPass, $curPass);
        if(!$update){
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Güncelleme Başarısız'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'Güncelleme Başarılı!'
        ]);
    }

    public function handleChangeEmail(){
        $newMail = isset($_POST['newMail']) ? $_POST['newMail'] : 0;

        if(!$newMail){
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz Mail Adresi!'
            ]);
        }

        $customer_id = $this->session->get('CustomerID');
        $update = $this->customerModel->changeMail($customer_id, $newMail);

        if(!$update){
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Güncelleme Başarısız'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'Güncelleme Başarılı!'
        ]);
    }
}