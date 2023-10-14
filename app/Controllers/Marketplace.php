<?php
namespace App\Controllers;
use App\Controllers\LayoutController;
use App\Models\MarketModel;

class Marketplace extends BaseController {
    protected $layout = null;
    private $marketModel = null;

    public function __construct(){
        $this->layout = new LayoutController();
        $this->marketModel = new MarketModel();
    }

    public function index($market_id){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        $pageData = $this->marketModel->handleGetPage($market_id);

        if(!$pageData) {
            return redirect()->to(base_url());
        }

        $items = $this->marketModel->getItems($market_id);
        $data['page'] = $this->marketModel->handleGetPage($market_id);

        foreach($items as $item){
            $attrs = explode(',', $item['attributes']);
            $data['items'][] = [
                'item_id' => (int)$item['item_id'],
                'title' => $item['title'],
                'price' => (float)$item['price'],
                'attributes' => $attrs
            ];
        }

        return view('site/market/market', $data);
    }

    public function gc(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        return view('site/market/gc', $data);
    }

    public function server(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        return view('site/market/server', $data);
    }

    public function vip(){
        $data['header'] = $this->layout->renderHeader();
        $data['footer'] = $this->layout->renderFooter();

        return view('site/market/vip', $data);
    }
}