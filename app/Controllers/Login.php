<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\LayoutController;
use App\Models\CustomerModel;

class Login extends BaseController
{
    protected $customerModel = null;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $session = session();

        if ($session->get('CustomerID')) {
            return redirect('/');
        }

        $layout = new LayoutController;

        $data['header'] = $layout->renderHeader();
        $data['footer'] = $layout->renderFooter();

        return view('site/login', $data);
    }

    public function logout()
    {
        $session = session();

        $session->remove('CustomerID');
        $session->remove('isAdmin');
        return redirect('/');
    }

    public function register()
    {
        $layout = new LayoutController;

        $data['header'] = $layout->renderHeader();
        $data['footer'] = $layout->renderFooter();

        return view('site/register', $data);
    }

    public function handleRegister()
    {
        $session = session();
        if ($session->get('CustomerID')) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Zaten Giriş Yapmışsın!'
            ]);
        }

        $email = isset($_POST['email']) ? $_POST['email'] : 0;
        $password = isset($_POST['password']) ? $_POST['password'] : 0;
        $username = isset($_POST['username']) ? $_POST['username'] : 0;

        if (!$email) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz Email'
            ]);
        }
        if (!$username) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz K.Adı'
            ]);
        }
        if (!$password) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz Şifre'
            ]);
        }
        $register = $this->customerModel->register([
            'email' => $email,
            'password' => $password,
            'username' => $username
        ]);

        if (!$register) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Kayıt Olma Başarısız',
				'data' => $register
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'Hesabınız başarıyla oluşturuldu'
        ]);
    }

    public function handleLogin()
    {
        $session = session();
        if ($session->get('CustomerID')) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Zaten Giriş Yapmışsın!'
            ]);
        }

        $email = isset($_POST['email']) ? $_POST['email'] : 0;
        $password = isset($_POST['password']) ? $_POST['password'] : 0;

        if (!$email) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz email'
            ]);
        }

        if (!$password) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Geçersiz Şifre'
            ]);
        }

        $auth = $this->customerModel->login($email, $password);
        if (!$auth) {
            return $this->response->setJSON([
                'error' => true,
                'response' => 'Giriş başarısız!'
            ]);
        }

        $customerData = $this->customerModel->getCustomer($auth);
        if($customerData && $customerData['IsDeveloper'] == 126){
            $session->set('isAdmin', true);
        }

        $session->set('CustomerID', $auth);

        return $this->response->setJSON([
            'error' => false,
            'response' => 'Başarıyla Giriş Yapıldı!',
            'CustomerID' => $auth
        ]);
    }
}
