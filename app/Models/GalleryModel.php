<?php
namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model {
    public function getGallery(){
        $sql = "SELECT * FROM gallery_items ORDER BY item_id DESC";
        $results = $this->db->query($sql)->getResultArray();

        return $results;
    }
}