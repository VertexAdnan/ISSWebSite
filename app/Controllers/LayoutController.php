<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\MarketModel;
use App\Models\SettingModel;
use DateTime;

class LayoutController extends BaseController
{
    private $url = null;
    private $customerModel = null;
    private $settings = null;
    private $marketModel = null;

    public function __construct()
    {
        $session = session();
        $this->customerModel = new CustomerModel();
        $this->settings = new SettingModel();
        $this->marketModel = new MarketModel();
        $this->url = base_url();

        $customer_id = $session->get('CustomerID') ? $session->get('CustomerID') : 0;

        if ($customer_id) {
            $customerData = $this->customerModel->getCustomer($customer_id);
            if ($customerData && $customerData['IsDeveloper'] == 126) {
                $session->set('isAdmin', true);
            } else {
                $session->set('isAdmin', false);
            }
        } else {
            $session->set('isAdmin', false);
        }
    }

    public function renderHeader($arr = [])
    {
        $session = session();

        $logged_in = $session->get('CustomerID') ? $session->get('CustomerID') : false;
        $data['logged_in'] = $logged_in;
        $data['is_premium'] = false;
        $data['premiumx_expire'] = false;
        $data['banned'] = false;
        $data['customer_name'] = false;
        $data['TimePlayed'] = false;
        $data['ip'] = false;
        $data['register_date'] = false;
        $data['email'] = false;
        $data['account_status'] = false;
        $data['bad_login_time'] = false;
        $data['isAdmin'] = $session->get('isAdmin') ? $session->get('isAdmin') : false;
        $data['settings'] = $this->settings->getSettings();

        if ($logged_in) {
            $userData = $this->customerModel->getCustomerProfile($logged_in);
            if (!$userData) {
                $session->remove('CustomerID');
                return redirect('/');
            }

            $date1 = new DateTime("now");
            $date2 = new DateTime($userData['PremiumExpireTime']);

            if ($date1 < $date2) {
                $data['is_premium'] = true;
                $data['premium_expire'] = $userData['PremiumExpireTime'];
            }

            $data['banned'] = $userData['AccountStatus'] == 100 ? false : true;
            $data['customer_name'] = $userData['UserID'];
            $data['time_played'] = $userData['TimePlayedTotal'];
            $data['ip'] = $userData['lastloginIP'];
            $data['register_date'] = date("Y-m-d", strtotime($userData['dateregistered']));
            $data['email'] = $userData['email'];
            $data['account_status'] = $userData['AccountStatus'];
            $data['bad_login_time'] = $userData['BadLoginTime'];
        }

        $marketPages = $this->marketModel->getMarkets();

        $markets = [];
        foreach($marketPages as $market){
            $markets[] = [
                'title' => $market['title'],
                'route' => base_url() . 'market/' . $market['market_id']
            ];
        }

        $data['mainMenu'] = [
            [
                'title' => 'Anasayfa',
                'title_en' => 'home',
                'route' => base_url(),
                'childs' => null
            ],
            [
                'title' => 'Haberler',
                'title_en' => 'news',
                'route' => base_url() . 'haberler',
                'childs' => null
            ],
            [
                'title' => 'Market',
                'title_en' => 'market',
                'route' => '#',
                'childs' => $markets
            ],
            [
                'title' => 'Sıralama',
                'title_en' => 'leaderboard',
                'route' => base_url() . 'siralama',
                'childs' => []
            ],
            [
                'title' => 'Oyunu İndir',
                'title_en' => 'download',
                'route' => base_url() . 'indir',
                'childs' => null
            ]
        ];


        $data['uri'] = $this->url;
        $data = array_merge($data, $arr);

        return view('site/lays/header', $data);
    }

    public function renderFooter($arr = [])
    {
        $data = [];
        $data['uri'] = $this->url;
        $data = array_merge($data, $arr);
        return view('site/lays/footer', $data);
    }
}
