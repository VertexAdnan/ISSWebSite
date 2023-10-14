<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;
use App\Models\DownloadModel;

class Downloads extends BaseController {
    protected $layout = null;
    protected $downloadModel = null;

    public function __construct()
    {  
       $this->layout = new LayoutAdmin();
       $this->downloadModel = new DownloadModel(); 
    }

    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['downloads'] = $this->downloadModel->getLinks();  

        if(isset($_POST['link'])){
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $link = $_POST['link'];

            $results = $this->downloadModel->addLink([
                'title' => $title,
                'link' => $link
            ]);

            if($results){
                return redirect()->to('admin/downloads?success=true');
            } else {
                return redirect()->to('admin/downloads?success=false');
            }
        }

        return view('admin/downloads', $data);
    }

    public function handleGetDownload($download_id){
        $data = $this->downloadModel->getDownload($download_id);

        return $this->response->setJSON([
            'error' => false,
            'data' => $data
        ]);
    }

    public function handleRemoveDownload($download_id){
        $results = $this->downloadModel->removeDownload($download_id);

        if(!$results) return $this->response->setJSON([
            'error' => true,
            'response' => 'İşlem başarısız'
        ]);

        return $this->response->setJSON([
            'error' => false,
            'response' => 'İşlem başarılı'
        ]);
    }
}