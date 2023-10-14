<?php

namespace App\Models;

use CodeIgniter\Model;

class BannersModel extends Model
{
    public function getBanners($active = false)
    {
        $sql = "SELECT * FROM vpanel_banners";

        if ($active) {
            $sql .= " WHERE status = 1";
        }

        $sql .= " ORDER BY banner_id DESC";
        return $this->db->query($sql)->getResultArray();
    }

    public function addBanner($data)
    {
        if (isset($data['banner_id']) && $data['banner_id']) {
            if (isset($data['file']) && $data['file']) {
                $sql = "UPDATE vpanel_banners (banner, main, status) VALUES ('" . $data['file'] . "', '" . $data['main'] . "', '" . $data['status'] . "')";
            } else {
                $sql = "UPDATE vpanel_banners (main, status) VALUES ('" . $data['main'] . "', status = '" . $data['status'] . "')";
            }

            $sql .= " WHERE banner_id = '" . $data['banner_id'] . "'";
        } else {
            $sql = "INSERT INTO (banner, main, status) VALUES ('" . $data['file'] . "', '" . $data['main'] . "', '" . $data['status'] . "')";
        }

        return $this->db->query($sql);
    }

    public function getBanner($banner_id)
    {
        $sql = "SELECT * FROM vpanel_banners WHERE banner_id = '" . $banner_id . "'";
        return $this->db->query($sql)->getRowArray();
    }

    public function removeBanner($banner_id)
    {
        $sql = "DELETE FROM vpanel_banners WHERE banner_id = '" . $banner_id . "'";
        return $this->db->query($sql);
    }

    public function buildBanners()
    {
        $banners = $this->getBanners();
    
        $results = [];

        foreach ($banners as $banner) {
            if ($banner['status'] == 0) continue;

            if ($banner['main'] == 1) {
                $results['main'] = $banner['banner'];
            } else {
                $results['banners'][] = [
                    'banner' => $banner['banner']
                ];
            }
        }
        //die(print_r($results));
        return $results;
    }
}
