<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\Admin\LayoutAdmin;
use App\Models\MarketModel;

class Market extends BaseController {
    protected $layout = null;
    protected $marketModel = null;
    public function __construct()
    {  
       $this->layout = new LayoutAdmin(); 
       $this->marketModel = new MarketModel(); 
    }
    public function index(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['markets'] = $this->marketModel->getMarkets();

        return view('admin/market', $data);
    }

    public function pages(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['markets'] = $this->marketModel->getMarkets();

        if(isset($_POST['market_title'])){
            $title = $_POST['market_title'];
            $page_id = isset($_POST['page_id']) ? $_POST['page_id'] : 0;

            $results = $this->marketModel->addPage($title, $page_id);

            if($results){
                return redirect()->to('admin/market/pages?success=true');
            } else {
                return redirect()->to('admin/market/pages?success=false');
            }
        }

        $data['success'] = isset($_GET['success']) ? $_GET['success'] : null;

        return view('admin/market/addPage', $data);
    }

    public function handleGetPage($page_id){
        $data = $this->marketModel->handleGetPage($page_id);

        return $this->response->setJSON([
            'error' => false,
            'data' => $data
        ]);
    }

    public function handleRemovePage($page_id){
        $results = $this->marketModel->removePage($page_id);

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

    public function items(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();
        $data['items'] = $this->marketModel->getItems();
        $data['markets'] = $this->marketModel->getMarkets();

        if(isset($_POST['item_title'])){
            $item_title = $_POST['item_title'];
            $market_id = isset($_POST['page_id']) ? (int)$_POST['page_id'] : 0;
            $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
            $attrs = isset($_POST['attrs']) ? $_POST['attrs'] : '';
            $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : '';

            $results = $this->marketModel->addItem([
                'title' => $item_title,
                'market_id' => $market_id,
                'price' => $price,
                'attrs' => $attrs,
                'item_id' => $item_id
            ]);

            if($results){
                return redirect()->to('admin/market/items?success=true');
            } else {
                return redirect()->to('admin/market/items?success=false');
            }
        }

        $data['success'] = isset($_GET['success']) ? $_GET['success'] : null;

        return view('admin/market/items', $data);
    }

    public function handleGetItem($item_id){
        $data = $this->marketModel->getItem($item_id);

        return $this->response->setJSON([
            'error' => false,
            'data' => $data
        ]);
    }

    public function handleRemoveItem($item_id){
        $results = $this->marketModel->removeItem($item_id);

        if(!$results) return $this->response->setJSON([
            'error' => true,
            'response' => 'İşlem başarısız!'
        ]);

        return $this->response->setJSON([
            'error' => false,
            'response' => 'İşlem başarılı!'
        ]);
    }
}