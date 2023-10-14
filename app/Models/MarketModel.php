<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketModel extends Model
{
    public function getMarkets()
    {
        $sql = "SELECT * FROM vpanel_market";
        return $this->db->query($sql)->getResultArray();
    }

    public function getMarketItems($market_id)
    {
        $sql = "SELECT * FROM vpanel_market_item WHERE market_id = '" . $market_id . "'";
        return $this->db->query($sql)->getResultArray();
    }

    public function addPage($title, $page_id = 0)
    {
        if ($page_id) {
            $sql = "UPDATE vpanel_market SET title = '" . $this->db->escapeLikeString($title) . "' WHERE market_id = '" . $page_id . "'";
        } else {
            $sql = "INSERT INTO vpanel_market (title) VALUES ('" . $this->db->escapeLikeString($title) . "')";
        }

        return $this->db->query($sql);
    }

    public function handleGetPage($page_id)
    {
        $sql = "SELECT * FROM vpanel_market WHERE market_id = '" . $page_id . "'";

        $results = $this->db->query($sql);
        return $results->getRowArray();
    }

    public function removePage($page_id)
    {
        $sql = "DELETE FROM vpanel_market WHERE market_id = '" . $page_id . "'";
        $results = $this->db->query($sql);

        if ($results) {
            $results = $this->db->query("DELETE FROM vpanel_market_item WHERE market_id = '" . $page_id . "'");
        } else {
            return false;
        }

        return $results;
    }

    public function getItems($market_id = 0)
    {
        $sql = "SELECT vi.*, v.title as page_name FROM vpanel_market_item vi LEFT JOIN vpanel_market v ON vi.market_id = v.market_id";

        if($market_id){
            $sql .= " WHERE v.market_id = '".$this->db->escapeLikeString($market_id)."'";
        }

        $sql .= " ORDER BY vi.item_id DESC";
        return $this->db->query($sql)->getResultArray();
    }

    public function addItem($data)
    {
        if (isset($data['item_id']) && $data['item_id']) {
            $sql = "UPDATE vpanel_market_item SET market_id = '".$data['market_id']."', title = '".$data['title']."', price = '".$data['price']."', attributes = '".$data['attrs']."' WHERE item_id = '".$data['item_id']."'";
        } else {
            $sql = "INSERT INTO vpanel_market_item (market_id, title, price, attributes) VALUES ('" . $data['market_id'] . "', '" . $data['title'] . "', '" . $data['price'] . "', '" . $data['attrs'] . "')";
        }
        return $this->db->query($sql);
    }

    public function getItem($item_id)
    {
        $sql = "SELECT vi.*, v.title as page_name FROM vpanel_market_item vi LEFT JOIN vpanel_market v ON vi.market_id = v.market_id WHERE vi.item_id = '" . $item_id . "'";
        return $this->db->query($sql)->getRowArray();
    }

    public function removeItem($item_id)
    {
        $sql = "DELETE FROM vpanel_market_item WHERE item_id = '" . $item_id . "'";
        return $this->db->query($sql);
    }
}
