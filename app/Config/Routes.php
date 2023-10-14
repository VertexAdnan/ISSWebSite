<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
use App\Controllers\Errors\Errors;


$routes->get('/', 'Home::index');
$routes->get('anasayfa', 'Home::index');
$routes->get('giris', 'Login::index');
$routes->get('kaydol', 'Login::register');
/*$routes->get('market/vip', 'Marketplace::vip');
$routes->get('market/gc', 'Marketplace::gc');
$routes->get('market/sunucu', 'Marketplace::server');*/
$routes->get('market/(:num)', 'Marketplace::index/$1');
$routes->get('siralama', 'Leaderboard::index');
$routes->get('indir', 'Download::index');

$routes->get('haberler', 'News::index');
$routes->get('getNews/(:num)', 'News::getNews/$1');

$routes->post('login/handleLogin', 'Login::handleLogin');
$routes->post('register/handleRegister', 'Login::handleRegister');
$routes->get('cikis', 'Login::logout');
$routes->get('kullanici', 'Profile::index');
$routes->get('kullanici/ayarlar', 'Profile::settings');
$routes->get('kullanici/kupon', 'Profile::useCoupon');

$routes->post('profile/changePassword', 'Profile::handleChangePassword');
$routes->post('profile/changeMail', 'Profile::handleChangeEmail');
$routes->post('profile/useCoupon', 'Profile::handleUseCoupon');

// admin routes
$routes->get('admin', 'Admin\Home::index');
$routes->get('admin/home', 'Admin\Home::index');

$routes->get('admin/event', 'Admin\Event::index');

// NEWS
$routes->get('admin/news', 'Admin\News::index');
$routes->post('admin/news', 'Admin\News::index');
$routes->get('admin/news/delete/(:num)', 'Admin\News::handleDelete/$1');
$routes->get('admin/news/get/(:num)', 'Admin\News::get/$1');

// CUSTOMER
$routes->get('admin/accounts', 'Admin\Customers::index');
$routes->post('admin/accounts/setGC/(:num)', 'Admin\Customers::setGC/$1');
$routes->post('admin/accounts/setGD/(:num)', 'Admin\Customers::setGD/$1');
$routes->post('admin/accounts/setStatus/(:num)', 'Admin\Customers::setStatus/$1');
$routes->post('admin/accounts/setPremium/(:num)', 'Admin\Customers::setPremium/$1');

// MARKET
$routes->get('admin/market', 'Admin\Market::index');
$routes->get('admin/market/pages', 'Admin\Market::pages');
$routes->post('admin/market/pages', 'Admin\Market::pages');
$routes->get('admin/market/handleGetPage/(:num)', 'Admin\Market::handleGetPage/$1');
$routes->get('admin/market/handleRemovePage/(:num)', 'Admin\Market::handleRemovePage/$1');
$routes->get('admin/market/items', 'Admin\Market::items');
$routes->post('admin/market/items', 'Admin\Market::items');
$routes->get('admin/market/handleGetItem/(:num)', 'Admin\Market::handleGetItem/$1');
$routes->get('admin/market/handleRemoveItem/(:num)', 'Admin\Market::handleRemoveItem/$1');

// COUPON
$routes->get('admin/coupons', 'Admin\Coupons::index');
$routes->get('admin/coupons/handleGetCoupon/(:num)', 'Admin\Coupons::handleGetCoupon/$1');
$routes->get('admin/coupons/handleRemoveCoupon/(:num)', 'Admin\Coupons::handleRemoveCoupon/$1');
$routes->post('admin/coupons', 'Admin\Coupons::index');

// Download
$routes->get('admin/downloads', 'Admin\Downloads::index');
$routes->get('admin/downloads/handleGetDownload/(:num)', 'Admin\Downloads::handleGetDownload/$1');
$routes->get('admin/downloads/handleRemoveDownload/(:num)', 'Admin\Downloads::handleRemoveDownload/$1');

// Banners
$routes->get('admin/banners', 'Admin\Banners::index');
$routes->get('admin/banners/handleGetBanner/(:num)', 'Admin\Banners::handleGetBanner/$1');
$routes->get('admin/banners/handleRemoveBanner/(:num)', 'Admin\Banners::handleRemoveBanner/$1');

// Setting
$routes->get('admin/settings', 'Admin\Settings::index');
$routes->post('admin/settings', 'Admin\Settings::index');
//$routes->get('errtest', 'Errors\Errors::index');
$routes->set404Override(function() {
    $errors = new Errors();
    return $errors->index();
});