<?php
namespace App\Models;
use CodeIgniter\Model;

class SettingModel extends Model {
    public function getSettings(){
        $sql = "SELECT * FROM vpanel_settings";
        return $this->db->query($sql)->getRowArray();
    }

    public function updateSettings($data){
        $sql = "UPDATE vpanel_settings SET sitename = '".$data['sitename']."', description = '".$data['description']."', discord = '".$data['discord']."', youtube = '".$data['youtube']."'";
        if(isset($data['logo']) && $data['logo']){
            $sql .= " , logo = '".$data['logo']."'";
        }

        return $this->db->query($sql);
    }
}