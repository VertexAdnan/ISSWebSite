<?php

namespace App\Models;

use CodeIgniter\Model;

class CouponModel extends Model
{
    public function getCoupon($coupon_id){
        $sql = "SELECT * FROM vpanel_coupon WHERE coupon_id = '".$coupon_id."'";
        return $this->db->query($sql)->getRowArray();
    }

    public function removeCoupon($coupon_id){
        $sql = "DELETE FROM vpanel_coupon WHERE coupon_id = '".$coupon_id."'";
        return $this->db->query($sql);
    }

    public function getCoupons(){
        $sql = "SELECT * FROM vpanel_coupon ORDER BY coupon_id DESC";
        return $this->db->query($sql)->getResultArray();
    }

    public function getCouponsUsed($customer_id)
    {
        $sql = "SELECT vp.* FROM vpanel_coupon_log vpl LEFT JOIN vpanel_coupon vp ON vp.coupon_id = vpl.coupon_id WHERE vpl.CustomerID = '" . $customer_id . "'";
        $results = $this->db->query($sql)->getResultArray();

        return $results;
    }

    public function useCoupon($coupon, $customer_id)
    {
        $check = $this->db->query("SELECT coupon_id, gc, dollar, vipdays FROM vpanel_coupon WHERE coupon = '" . $this->db->escapeLikeString($coupon) . "' AND count > 0")->getRowArray();

        if (!$check && !isset($check['coupon_id'])) {
            return false;
        }

        $add = $this->db->query("UPDATE UsersData SET GameDollars = GameDollars + '" . $check['dollar'] . "', GamePoints = GamePoints + '" . $check['gc'] . "', PremiumExpireTime = DATEADD(day, " . (int)$check['vipdays'] . ", PremiumExpireTime) WHERE CustomerID = '" . $customer_id . "'");
        if (!$add) {
            return false;
        }

        $updateCoupon = $this->db->query("UPDATE vpanel_coupon SET used = used + 1, count = count - 1");
        if ($updateCoupon) {
            $logSql = "INSERT INTO vpanel_coupon_log (coupon_id, CustomerID) VALUES (" . (int)$check['coupon_id'] . ", " . (int)$customer_id . ")";
            //die($logSql);
            $this->db->query($logSql);
            return true;
        }
        return false;
    }

    public function addCoupon($data)
    {
        if (isset($data['coupon_id']) && $data['coupon_id']) {
            $sql = "UPDATE vpanel_coupon SET coupon = '".$data['coupon']."', dollar = '".$data['dollar']."', vipdays = '".$data['vipdays']."', count = '".$data['count']."' WHERE coupon_id = '".$data['coupon_id']."'";
        } else {
            $sql = "INSERT INTO vpanel_coupon (coupon, dollar, gc, vipdays, count, used, status) VALUES('".$data['coupon']."', '".$data['dollar']."', '".$data['gc']."', '".$data['vipdays']."', '".$data['count']."', '".$data['used']."', '".$data['status']."')";
        }

        return $this->db->query($sql);
    }
}
