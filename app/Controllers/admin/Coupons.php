<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;
use App\Models\CouponModel;

class Coupons extends BaseController
{
    protected $layout = null;
    protected $couponModel = null;

    public function __construct()
    {
        $this->layout = new LayoutAdmin();
        $this->couponModel = new CouponModel();
    }

    public function index()
    {
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['coupons'] = $this->couponModel->getCoupons();

        if (isset($_POST['coupon'])) {
            $coupon = $_POST['coupon'];
            $dollar = isset($_POST['dollar']) ? (int)$_POST['dollar'] : 0;
            $gc = isset($_POST['gc']) ? (int)$_POST['gc'] : 0;
            $vipdays = isset($_POST['vipdays']) ? (int)$_POST['vipdays'] : 0;
            $count = isset($_POST['count']) ? (int)$_POST['count'] : 0;
            $used = 0;
            $status = 1;
            $coupon_id = isset($_POST['coupon_id']) ? (int)$_POST['coupon_id'] : 0;

            $results = $this->couponModel->addCoupon([
                'coupon' => $coupon,
                'dollar' => $dollar,
                'gc' => $gc,
                'vipdays' => $vipdays,
                'count' => $count,
                'used' => $used,
                'status' => $status,
                'coupon_id' => $coupon_id
            ]);

            if ($results) {
                return redirect()->to('admin/coupons?success=true');
            } else {
                return redirect()->to('admin/coupons?success=false');
            }
        }

        return view('admin/coupons', $data);
    }

    public function handleGetCoupon($coupon_id)
    {
        $data = $this->couponModel->getCoupon($coupon_id);
        return $this->response->setJSON([
            'error' => false,
            'data' => $data
        ]);
    }

    public function handleRemoveCoupon($coupon_id){
        $results = $this->couponModel->removeCoupon($coupon_id);

        if(!$results) return $this->response->setJSON([
            'error' => true,
            'response' => 'İşlem başarısız!'
        ]);

        return $this->response->setJSON([
            'error' => false,
            'response' => 'İşlem Başarılı!'
        ]);
    }
}
