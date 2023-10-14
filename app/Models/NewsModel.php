<?php
namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model {
    public function getNews($start = 0, $limit = 3){
        $results = $this->db->query("SELECT * FROM vpanel_news ORDER BY date_added DESC OFFSET ".(int)$start." ROWS FETCH NEXT ".(int)$limit." ROWS ONLY")->getResultArray();

        return $results;
    }

    public  function deleteNew($new_id){
        $sql = "DELETE FROM vpanel_news WHERE news_id = '".$new_id."'";

        return $this->db->query($sql);
    }

    public function get($news_id){
        $sql = "SELECT * FROM vpanel_news WHERE news_id = '".$news_id."'";
        $results = $this->db->query($sql)->getRowArray();

        return $results;
    }

    public function addOrUpdateNews($data){
  
        if(isset($data['news_id']) && $data['news_id']){
            if(isset($data['image']) && $data['image']){
                $sql = "UPDATE vpanel_news SET tags = '".$this->db->escapeLikeString($data['tags'])."', title = '".$this->db->escapeLikeString($data['title'])."', image = '".$data['image']."'";
            } else {
                $sql = "UPDATE vpanel_news SET tags = '".$this->db->escapeLikeString($data['tags'])."', title = '".$this->db->escapeLikeString($data['title'])."'";
            }
        } else {
            if(isset($data['image']) && $data['image']){
                $sql = "INSERT INTO vpanel_news (tags, description, title, date_added, image) VALUES('".$this->db->escapeLikeString($data['tags'])."', '".$this->db->escapeLikeString($data['description'])."', '".$this->db->escapeLikeString($data['title'])."', '".date("Y-m-d h:i:s")."', '".$data['image']."')";
            } else {
                $sql = "INSERT INTO vpanel_news (tags, description, title, date_added) VALUES('".$this->db->escapeLikeString($data['tags'])."', '".$this->db->escapeLikeString($data['description'])."', '".$this->db->escapeLikeString($data['title'])."', '".date("Y-m-d h:i:s")."')";
            }
        }

        if(!isset($sql)) return false;

        $results = $this->db->query($sql);
        return $results;
    }
}