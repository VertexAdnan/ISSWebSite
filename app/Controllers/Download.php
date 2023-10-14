<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\LayoutController;
use App\Models\DownloadModel;

class Download extends BaseController {
    protected $downloadModel = null;
    public function __construct(){
        $this->downloadModel = new DownloadModel();
    }

    public function index(){
        $layout = new LayoutController();
        $data['header'] = $layout->renderHeader();
        $data['footer'] = $layout->renderFooter();
        $data['links'] = $this->downloadModel->getLinks();

        return view('site/download', $data);
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
            'response' => 'İşlem başarılı!'
        ]);
    }
}