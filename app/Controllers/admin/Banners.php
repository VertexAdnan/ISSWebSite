<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;
use App\Models\BannersModel;

class Banners extends BaseController {
    protected $layout = null;
    protected $bannerModel = null;
    
    public function __construct()
    {  
       $this->layout = new LayoutAdmin();
       $this->bannerModel = new BannersModel();
    }
    
    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['banners'] = $this->bannerModel->getBanners();

        if(isset($_POST['main'])){
            $file = false;
            $error = false;

            if(isset($_FILES['file'])){
                $file = $_FILES['file'];
                $fileName = uniqid() . $_FILES['name'];
                $tmpName = $_FILES['tmp_name'];
                
                defined('HOMEPATH') || define('HOMEPATH', realpath(rtrim(getcwd(), '\\/ ')) . DIRECTORY_SEPARATOR);
                $source = is_dir(HOMEPATH . 'app')
                    ? HOMEPATH
                    : (is_dir('vendor/codeigniter4/framework/') ? 'vendor/codeigniter4/framework/' : 'vendor/codeigniter4/codeigniter4/');

                defined('PUBLICPATH') || define('PUBLICPATH', realpath($source . 'public') . DIRECTORY_SEPARATOR);

                $targetDir = PUBLICPATH . 'assets/images/';

                $move = move_uploaded_file($tmpName, $targetDir . $fileName);

                if(!$move){
                    $error = true;
                }

                $file = $fileName;
            }

            $banner_id = isset($_POST['banner_id']) ? $_POST['banner_id'] : 0;
            $main = isset($_POST['main']) ? $_POST['main'] : 0;
            $status = isset($_POST['status']) ? $_POST['status'] : 1;

            $results = $this->bannerModel->addBanner([
                'file' => $file,
                'main' => $main,
                'status' => $status                
            ]);

            if($results){
                return redirect()->to('admin/banners?success=true');
            } else {
                return redirect()->to('admin/banners?success=false');
            }
        }

        return view('admin/banners', $data);
    }

    public function handleGetBanner($banner_id){
        $data = $this->bannerModel->getBanner($banner_id);

        return $this->response->setJSON([
            'error' => false,
            'data' => $data
        ]);
    }

    public function handleRemoveBanner($banner_id){
        $results = $this->bannerModel->removeBanner($banner_id);

        if(!$results) return $this->response->setJSON([
            'error' => true,
            'response' => 'İşlem başarısız'
        ]);

        return $this->response->setJSON([
            'error' => false,
            'response' => 'İşlem başarılı!'
        ]); 
    }
}