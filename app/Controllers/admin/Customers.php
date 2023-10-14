<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;
use App\Models\CustomerModel;
use DateTime;

class Customers extends BaseController
{
    protected $layout = null;
    protected $customerModel = null;

    public function __construct()
    {
        $this->layout = new LayoutAdmin();
        $this->customerModel = new CustomerModel();
    }
    public function index()
    {
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $customers = $this->customerModel->getCustomers();

        foreach ($customers as $customer) {
            $date1 = new DateTime("now");
            $date2 = new DateTime($customer['PremiumExpireTime']);

            $data['customers'][] = [
                'CustomerID' => (int)$customer['CustomerID'],
                'email' => $customer['email'],
                'TimePlayed' => $customer['TimePlayed'],
                'isPremium' => $date1 < $date2,
                'GamePoints' => $customer['GamePoints'],
                'GameDollars' => $customer['GameDollars'],
                'accountStatus' => ($customer['AccountStatus'] == 100 ? 'NORMAL' : 'YASAKLI')
            ];
        }

        return view('admin/customers', $data);
    }

    public function setGC($customer_id)
    {
        $gc = isset($_POST['gc']) ? (int)$_POST['gc'] : 0;
        $add = isset($_POST['add']) && $_POST['add'] ? true : false;

        $results = $this->customerModel->changeGC($customer_id, $gc, $add);

        if (!$results) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'İşlem başarısız!'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'GC Başarıyla Eklendi!'
        ]);
    }

    public function setGD($customer_id)
    {
        $gd = isset($_POST['gd']) ? (int)$_POST['gd'] : 0;
        $add = isset($_POST['add']) && $_POST['add'] ? true : false;

        $results = $this->customerModel->changeGD($customer_id, $gd, $add);

        if (!$results) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'İşlem başarısız!'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'GD Başarıyla Eklendi!'
        ]);
    }

    public function setPremium($customer_id)
    {
        $days = isset($_POST['days']) ? (int)$_POST['days'] : 0;

        $results = $this->customerModel->addPremiumDays($customer_id, $days);

        if (!$results) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'İşlem başarısız!'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'VIP Başarıyla eklendi!'
        ]);
    }

    public function setStatus($customer_id)
    {
        //$ban = isset($_POST['ban']) && $_POST['ban'] ? 200 : 100;

        $results = $this->customerModel->toggleStatus($customer_id);


        if (!$results) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'İşlem başarısız!'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => $results == 'ban' ? 'Oyuncu yasaklandı!' : 'Yasak Kaldırıldı!',
            'status' => $results
        ]);
    }
}
