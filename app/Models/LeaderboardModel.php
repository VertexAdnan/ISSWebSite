<?php
namespace App\Models;
use CodeIgniter\Model;

class LeaderboardModel extends Model {
    public function getXPBoard(){
        $sql = "select TOP 10 l.*, cd.ClanTag, cd.ClanTagColor from Leaderboard00 l left join ClanData cd on cd.ClanId=l.ClanID order by Pos asc";
        $results = $this->db->query($sql)->getResultArray();
        return $results;
    }
    public function getTPBoard(){
        $sql = "select TOP 10 l.*, cd.ClanTag, cd.ClanTagColor from Leaderboard01 l left join ClanData cd on cd.ClanId=l.ClanID order by Pos asc";
        $results = $this->db->query($sql)->getResultArray();
        return $results;
    }
    public function getZKBoard(){
        $sql = "select TOP 10 l.*, cd.ClanTag, cd.ClanTagColor from Leaderboard02 l left join ClanData cd on cd.ClanId=l.ClanID order by Pos asc";
        $results = $this->db->query($sql)->getResultArray();
        return $results;
    }
}