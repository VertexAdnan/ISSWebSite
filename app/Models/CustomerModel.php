<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    public function toggleStatus($customer_id){
        $sql = "SELECT AccountStatus FROM UsersData WHERE CustomerID = '".$customer_id."'";
        $results = $this->db->query($sql)->getRowArray();
        $setStatus = 100;
        if($results['AccountStatus'] == 100){
            $setStatus = 200;
        } else {
            $setStatus = 100;
        }

        $results = $this->setCustomerStatus($customer_id, $setStatus);
        if(!$results) return false;

        return ($setStatus == 100 ? 'unban' : 'ban');
    }
    public function addPremiumDays($customer_id, $days){
        $sql = "UPDATE UsersData SET PremiumExpireTime = DATEADD(day, {$days}, '".date("Y-m-d")."') WHERE CustomerID = '".$customer_id."'";
        //die($sql);
        return $this->db->query($sql);
    }
    public function setCustomerStatus($customer_id, $status){
        $sql = "UPDATE UsersData SET AccountStatus = '".$status."' WHERE CustomerID = '".$customer_id."';";
        $sql .= " UPDATE Accounts SET AccountStatus = '".$status."' WHERE CustomerID = '".$customer_id."';";
        return $this->db->query($sql);
    }
    public function changeGC($customer_id, $gc, $add = true){
        $sql = "UPDATE UsersData SET GamePoints = GamePoints ".($add ? '+' : '-')." '".$gc."' where CustomerID = '".$customer_id."'";
        
        return $this->db->query($sql);
    }

    public function changeGD($customer_id, $gd, $add = true){
        $sql = "UPDATE UsersData SET GameDollars = GameDollars ".($add ? '+' : '-')." '".$gd."' where CustomerID = '".$customer_id."'";
       
        return $this->db->query($sql);
    }

    public function getLastAccounts($count = 5, $status = 100){
        $sql = "SELECT TOP {$count} * FROM Accounts a LEFT JOIN UsersData ud ON a.CustomerID = ud.CustomerID ";
        if($status != 100){
            $sql .= " WHERE a.AccountStatus = {$status}";
        }

        $sql .= " ORDER BY a.CustomerID DESC";
        $results = $this->db->query($sql)->getResultArray();

        return $results;
    }
    public function totalDevelopers(){
        $sql = "SELECT COUNT(CustomerID) as count FROM Accounts WHERE IsDeveloper > 0";
        $results = $this->db->query($sql)->getRowArray();

        return isset($results['count']) ? (int)$results['count'] : 0;
    }
    public function getTotalChars(){
        $sql = "SELECT COUNT(CharID) as count FROM UsersChars";
        $results = $this->db->query($sql)->getRowArray();

        return isset($results['count']) ? (int)$results['count'] : 0;
    }
    public function getTotalAccounts($status = 100){
        $sql = "SELECT COUNT(CustomerID) as count FROM Accounts WHERE AccountStatus = {$status}";
        $results = $this->db->query($sql)->getRowArray();

        return isset($results['count']) ? (int)$results['count'] : 0;
    }

    public function changePassword($customer_id, $newPass, $oldPassword)
    {
        $checkOld = $this->db->query("SELECT MD5Password FROM Accounts WHERE CustomerID = '" . $customer_id . "' AND MD5Password = '" . $this->db->escapeLikeString($oldPassword) . "'")->getRowArray();
        if (!$checkOld) {
            return false;
        }
        $sql = "UPDATE Accounts SET MD5Password = '" . $this->db->escapeLikeString($newPass) . "' WHERE CustomerID = '" . $customer_id . "'";

        return $this->db->query($sql);
    }

    public function changeMail($customer_id, $newMail)
    {
        $control = $this->db->query("SELECT email FROM Accounts WHERE email = '" . $this->db->escapeLikeString($newMail) . "'")->getRowArray();

        if ($control) {
            return false;
        }

        $sql = "UPDATE Accounts SET email = '" . $this->db->escapeLikeString($newMail) . "' WHERE CustomerID = '" . $customer_id . "'";
        return $this->db->query($sql);
    }

    public function getCustomers()
    {
        $sql = "SELECT * FROM Accounts a LEFT JOIN UsersData ud ON a.CustomerID = ud.CustomerID ORDER BY a.CustomerID DESC";
        $results = $this->db->query($sql)->getResultArray();

        return $results;
    }

    public function getCustomer($customer_id){
        $sql = "SELECT * FROM Accounts a LEFT JOIN UsersData ud ON a.CustomerID = ud.CustomerID WHERE a.CustomerID = '".$customer_id."'";
        $results = $this->db->query($sql)->getRowArray();

        return $results;
    }

    public function getCustomerProfile($customer_id)
    {
        $sql = "SELECT *,
        (SELECT SUM(TimePlayed) FROM UsersChars uc WHERE uc.CustomerID = a.CustomerID) as TimePlayedTotal FROM Accounts a
        LEFT JOIN UsersData ud ON a.CustomerID = ud.CustomerID
        WHERE a.CustomerID = '" . $customer_id . "'";
        $results = $this->db->query($sql)->getRowArray();

        if (!$results) {
            return false;
        }

        return $results;
    }

    public function login($email, $password)
    {
        $sql = "SELECT CustomerID FROM Accounts WHERE email = '" . $this->db->escapeLikeString($email) . "' AND MD5Password = '" . $this->db->escapeLikeString($password) . "'";
        $results = $this->db->query($sql)->getRowArray();

        return isset($results['CustomerID']) ? $results['CustomerID'] : 0;
    }

    public function register($data)
    {
        $checkMail = $this->db->query("SELECT email FROM Accounts WHERE email = '".$this->db->escapeLikeString($data['email'])."'")->getRowArray();
        if($checkMail){
            return false;
        }
        /*$sql = "INSERT INTO Accounts ( 
            email,
            UserID,
            MD5Password,
            AccountStatus,
            dateregistered,
            ReferralID,
            lastlogindate,
            lastloginIP
        ) VALUES (
            '" . $this->db->escapeLikeString($data['email']) . "',
            '" . $this->db->escapeLikeString($data['username']) . "',
            '" . $this->db->escapeLikeString($data['password']) . "',
            '100',
            GETDATE(),
            0,
            GETDATE(),
            '" . $_SERVER['REMOTE_ADDR'] . "'
        )";*/

        $sql = "	INSERT INTO Accounts ( 
		email,
		MD5Password,
		dateregistered,
		ReferralID,
		lastlogindate,
		lastloginIP,
		Name,
		Username,
		Usercode,
		Age
	) VALUES (
		'" . $this->db->escapeLikeString($data['email']) . "',
		'" . $this->db->escapeLikeString($data['password']) . "',
		GETDATE(),
		0,
		GETDATE(),
		'" . $_SERVER['REMOTE_ADDR'] . "',
		'" . $this->db->escapeLikeString($data['username']) . "',
		'" . $this->db->escapeLikeString($data['username']) . "',
		0,
		1
	)";
      
        $createAccount = $this->db->query($sql);

        if ($createAccount) {
            $customer_id = $this->db->insertID();
            $sql = "	INSERT INTO UsersData (
                CustomerID,
                AccountType,
                dateregistered
            ) VALUES (
                '".$customer_id."',
                2,
                GETDATE()
            )";

            $this->db->query($sql);

            $sql = "exec FN_AddItemToUser " . (int)$customer_id . ", 20174, 2000;
            exec FN_AddItemToUser " . (int)$customer_id . ", 20182, 2000;
            exec FN_AddItemToUser " . (int)$customer_id . ", 20184, 2000;";

            $this->db->query($sql);
            return true;
        } else {
            return false;
        }
    }
}
