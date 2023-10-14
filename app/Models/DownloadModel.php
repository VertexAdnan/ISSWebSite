<?php
namespace App\Models;
use CodeIgniter\Model;

class DownloadModel extends Model {
    public function addLink($data){
        if(isset($data['download_id']) && $data['download_id']){
            $sql = "UPDATE vpanel_downloads SET title = '".$this->db->escapeLikeString($data['title'])."', link = '".$this->db->escapeLikeString($data['link'])."' WHERE download_id = '".$data['download_id']."'";
        } else {
            $sql = "INSERT INTO vpanel_downloads (title, link) VALUES ('".$this->db->escapeLikeString($data['title'])."', '".$this->db->escapeLikeString($data['link'])."')";
        }

        return $this->db->query($sql);
    }
    
    public function getLinks(){
        $results = $this->db->query("SELECT * FROM vpanel_downloads")->getResultArray();

        return $results;
    }

    public function getDownload($download_id){
        $sql = "SELECT * FROM vpanel_downloads WHERE download_id = '".$download_id."'";

        return $this->db->query($sql)->getRowArray();
    }

    public function removeDownload($download_id){
        $sql = "DELETE FROM vpanel_downloads WHERE download_id = '".$download_id."'";
        return $this->db->query($sql);
    }
}