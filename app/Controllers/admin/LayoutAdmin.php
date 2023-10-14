<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LayoutAdmin extends BaseController
{
    public function __construct()
    {
        $session = session();
        $isAdmin = $session->get('isAdmin') ? $session->get('isAdmin') : false;

        if (!isset($isAdmin) || !$isAdmin) {
            die('You`re not authorized!');
            return redirect()->to('giris');
        }
    }
    public function renderHeader($arr = [])
    {
        $data['uri'] = base_url();
        $uri = $data['uri'];
        $path = current_url(true);
        $pathArr = explode('/', $path);
        $path = end($pathArr);

        $segment2 = $pathArr[count($pathArr) - 2];

        $data['menuItems'] = [
            [
                'title' => 'Anasayfa',
                'route' =>  "{$uri}admin/home",
                'currentPage' => (($path == 'admin' || $path == 'home') ? true : false),
                'child' => []
            ],
            [
                'title' => 'Oyuncular',
                'route' =>  "{$uri}admin/accounts",
                'currentPage' => ($path && $path == 'accounts' ? true : false),
                'child' => []
            ],
            [
                'title' => 'Haberler',
                'route' =>  "{$uri}admin/news",
                'currentPage' => ($path == 'news' ? true : false),
                'child' => []
            ],
            [
                'title' => 'Market',
                'route' =>  "#",
                'currentPage' => ($segment2 == 'market' ? true : false),
                'child' => [
                    [
                        'title' => 'Sayfalar',
                        'route' => "{$uri}admin/market/pages"
                    ],
                    [
                        'title' => 'Ürünler',
                        'route' => "{$uri}admin/market/items"
                    ]
                ]
            ],
            [
                'title' => 'Kuponlar',
                'route' =>  "{$uri}admin/coupons",
                'currentPage' => ($path == 'coupons' ? true : false),
                'child' => []
            ],
            [
                'title' => 'İndirme Linkleri',
                'route' =>  "{$uri}admin/downloads",
                'currentPage' => ($path == 'downloads' ? true : false),
                'child' => []
            ],
            /*[
                'title' => 'Yaklaşan Etkinlik',
                'route' =>  "{$uri}admin/event",
                'currentPage' => ($path == 'event' ? true : false),
                'child' => []
            ],*/
            [
                'title' => 'Bannerlar',
                'route' =>  "{$uri}admin/banners",
                'currentPage' => (($path == 'banners') ? 1 : 0),
                'child' => []
            ],
            [
                'title' => 'Ayarlar',
                'route' =>  "{$uri}admin/settings",
                'currentPage' => (($path == 'settings') ? 1 : 0),
                'child' => []
            ],
            [
                'title' => 'Çıkış',
                'route' =>  "{$uri}cikis",
                'currentPage' => (($path == 'banners') ? 1 : 0),
                'child' => []
            ]
        ];

        //die(print_r($data['menuItems']));


        $data = array_merge($data, $arr);
        return view('admin/lays/header', $data);
    }

    public function renderFooter($arr = [])
    {
        $data = [];
        $data = array_merge($data, $arr);
        return view('admin/lays/footer', $data);
    }
}
