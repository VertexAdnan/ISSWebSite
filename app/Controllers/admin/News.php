<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;
use App\Models\NewsModel;

class News extends BaseController
{
    protected $layout = null;
    protected $newsModel = null;
    
    public function __construct()
    {
        $this->layout = new LayoutAdmin();
        $this->newsModel = new NewsModel();
    }

    public function index()
    {
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        $data['news'] = $this->newsModel->getNews(0, 999);
        $session = session();
        if (isset($_POST['title'])) {
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $image = isset($_FILES['file']) ? $_FILES['file'] : 0;
            
            if ($image) {
                $fileName = uniqid() . str_replace(' ', '', $image['name']);
                $tmpName = $image['tmp_name'];
                defined('HOMEPATH') || define('HOMEPATH', realpath(rtrim(getcwd(), '\\/ ')) . DIRECTORY_SEPARATOR);
                $source = is_dir(HOMEPATH . 'app')
                    ? HOMEPATH
                    : (is_dir('vendor/codeigniter4/framework/') ? 'vendor/codeigniter4/framework/' : 'vendor/codeigniter4/codeigniter4/');

                defined('PUBLICPATH') || define('PUBLICPATH', realpath($source . 'public') . DIRECTORY_SEPARATOR);
                $targetPath = PUBLICPATH . 'assets/images/';
                $move = move_uploaded_file($tmpName, $targetPath . $fileName);
                if($move){
                    $image = $fileName;
                }
            }

            $results = $this->newsModel->addOrUpdateNews([
                'title' => $title,
                'tags' => $tags,
                'description' => $description,
                'image' => $image
            ]);

            if($results){
                return redirect()->to('admin/news?success=true');
                //$session->setFlashdata('success', true);
            } else {
                return redirect()->to('admin/news?success=false');
                //$session->setFlashdata('success', false);
            }

            //$session->markAsTempdata('success', 3);
        }

        $data['success'] = isset($_GET['success']) ? $_GET['success'] : null;//$session->getFlashdata('success');
        //die($data['success']);
        return view('admin/news', $data);
    }
    public function handleDelete($news_id){
        $results = $this->newsModel->deleteNew($news_id);

        if(!$results){
            return $this->response->setJSON([
                'error' => true,
                'response' => 'İşlem başarısız!'
            ]);
        }

        return $this->response->setJSON([
            'error' => false,
            'response' => 'İşlem başarılı!'
        ]);
    }

    public function get($news_id){
        $data = $this->newsModel->get($news_id);

        return $this->response->setJSON([
            'error' => (isset($data['news_id']) ? false : true),
            'data' => $data
        ]);
    }
}
