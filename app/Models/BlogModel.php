<?php
namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model {
    public function getCategory($seo){
        $sql = "SELECT * FROM categories WHERE seo = '".$this->db->escapeLikeString($seo)."'";
        $results = $this->db->query($sql)->getRowArray();

        return $results;
    }

    public function getBlogTitle($seo){
        $sql = "SELECT title FROM blogs WHERE seo = '".$this->db->escapeLikeString($seo)."'";

        $results = $this->db->query($sql)->getRowArray();

        return isset($results['title']) ? $results['title'] : false;
    }

    public function getCategoryID($seo){
        $sql = "SELECT category_id FROM blogs WHERE seo = '".$this->db->escapeLikeString($seo)."'";
        $results = $this->db->query($sql)->getRowArray();
        return $results['category_id'];
    }
    public function getBlogStarred(){
        $sql = "SELECT b.*, c.title as category_title, u.username FROM blogs b LEFT JOIN categories C ON b.category_id = c.category_id LEFT JOIN users U ON u.user_id = b.createdby WHERE b.blog_id IS NOT NULL";
        $sql .= " AND b.starred = '1'";
        
        $results = $this->db->query($sql)->getRowArray();

        if(!$results){
            $sql = "SELECT b.*, c.*, u.username FROM blogs b LEFT JOIN categories C ON b.category_id = c.category_id LEFT JOIN users U ON u.user_id = b.createdby WHERE b.blog_id IS NOT NULL";
            $sql .= " ORDER BY b.blog_id DESC LIMIT 1";
            
            $results = $this->db->query($sql)->getRowArray();
        }

        return $results;
    }

    public function getCategories(){
        $sql = "SELECT c.*, (SELECT COUNT(DISTINCT b.blog_id) FROM blogs b WHERE b.category_id = c.category_id) as blog_count FROM categories c ORDER BY c.category_id DESC";

        return $this->db->query($sql)->getResultArray();
    }

    public function getBlog($seo){
        $sql = "SELECT b.*, c.title as category_title, u.username FROM blogs b LEFT JOIN categories C ON b.category_id = c.category_id LEFT JOIN users U ON u.user_id = b.createdby WHERE b.blog_id IS NOT NULL";
        $sql .= " AND b.seo = '".$this->db->escapeLikeString($seo)."'";
        //die($sql);
        $results = $this->db->query($sql)->getRowArray();

        return $results;
    }

    public function getBlogs($filter = []){
        $sql = "SELECT b.*, c.title as category_title, u.username FROM blogs b LEFT JOIN categories C ON b.category_id = c.category_id LEFT JOIN users U ON u.user_id = b.createdby WHERE b.blog_id IS NOT NULL";

        if(isset($filter['blog_seo']) && $filter['blog_seo']){
            $sql .= " AND b.seo = '".$this->db->escapeLikeString($filter['blog_seo'])."'";
        }

        if(isset($filter['category_seo']) && $filter['category_seo']){
            $sql .= " AND c.seo = '".$this->db->escapeLikeString($filter['category_seo'])."'";
        }

        if(isset($filter['category_id']) && $filter['category_id']){
            $sql .= " AND c.category_id = '".(int)$filter['category_id']."'";
        }

        $sql .= " ORDER BY b.createdat DESC";
        $sql .= " LIMIT ".$filter['start'].", ".$filter['limit']."";

        $results = $this->db->query($sql);

        $returns = [];
        foreach($results->getResultArray() as $result){
            $returns[] = [
                'blog_id' => (int)$result['blog_id'],
                'seo' => $result['seo'],
                'title' => $result['title'],
                'description' => substr($result['description'], 0, 20) . '...',
                'image' => $result['image'],
                'category_id' => (int)$result['category_id'],
                'tags' => $result['tags'],
                'createdby' => (int)$result['createdby'],
                'createdat' => $result['createdat'],
                'starred' => (int)$result['starred'],
                'category_title' => $result['category_title'],
                'username' => (int)$result['username'],
            ];
        }

        return $returns;
    }
}