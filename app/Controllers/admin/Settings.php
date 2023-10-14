<?php
namespace App\Controllers\Admin;

use App\Controllers\Admin\LayoutAdmin;
use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController {
    protected $layout = null;
    protected $settings = null;

    public function __construct(){
        $this->layout = new LayoutAdmin();
        $this->settings = new SettingModel();
    }

    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['settings'] = $this->settings->getSettings();

        if(isset($_POST['sitename'])){
            $file = false;

            if(isset($_FILES['logo'])){
                $fileName = uniqid() . $_FILES['logo']['name'];
                $tmpName = $_FILES['logo']['tmp_name'];

                defined('HOMEPATH') || define('HOMEPATH', realpath(rtrim(getcwd(), '\\/ ')) . DIRECTORY_SEPARATOR);
                $source = is_dir(HOMEPATH . 'app')
                    ? HOMEPATH
                    : (is_dir('vendor/codeigniter4/framework/') ? 'vendor/codeigniter4/framework/' : 'vendor/codeigniter4/codeigniter4/');

                defined('PUBLICPATH') || define('PUBLICPATH', realpath($source . 'public') . DIRECTORY_SEPARATOR);

                $targetPath = PUBLICPATH . 'assets/images/';
                $move = move_uploaded_file($tmpName, $targetPath . $fileName);

                if($move){
                    $file = $fileName;
                }
            }

            $results = $this->settings->updateSettings([
                'logo' => $file,
                'sitename' => $_POST['sitename'],
                'description' => $_POST['description'],
                'discord' => $_POST['discord'],
                'youtube' => $_POST['youtube'],
            ]);

            if($results){
                return redirect()->to('admin/settings?success=true');
                //$session->setFlashdata('success', true);
            } else {
                return redirect()->to('admin/settings?success=false');
                //$session->setFlashdata('success', false);
            }
        }






        return view('admin/settings', $data);
    }
}