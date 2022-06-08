<?php

namespace app;
use PDO;
use app\Models\Post;

class Database
{
    public \PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=cmsdb', 'usercms1', '123Cms@4567');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        self::$db = $this;
    }

    public function getAllPosts($search) 
    {
        if($search) {   
            $sql = "SELECT * FROM posts
                        WHERE datetime LIKE :search
                        OR title LIKE :search
                        OR category LIKE :search
                        OR post LIKE :search";
            $stmt = $this->pdo->prepare($sql);
            $search = '%'.$search.'%';
            $stmt->bindValue(':search', $search);
        } 
        else {
            $sql = "SELECT * FROM posts ORDER BY id desc";
            $stmt = $this->pdo->prepare($sql);
        }           
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function getComments($PostId, $status)
    {
        $sqlComment = "SELECT COUNT(*) FROM comments WHERE post_id = ? AND status = ?";
        $stmtComment = $this->pdo->prepare($sqlComment);
        $stmtComment->bindValue(1, $PostId);
        $stmtComment->bindValue(2, $status);

        $stmtComment->execute();
        $result = $stmtComment->fetch()[0];
        // $result = $stmtComment->fetchall();
        return intval($result);
        // var_dump($result);
        // exit;
    }
    public function createPost($post) 
    {
        $sql = 'INSERT INTO posts (datetime, title, category, author, image, post)';
        $sql .= 'VALUES( :datetime, :titleName, :categoryName, :adminName, :imageName, :postDescription)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':datetime', $post->datetime);
        $stmt->bindValue(':titleName', $post->title);
        $stmt->bindValue(':categoryName', $post->category);
        $stmt->bindValue(':adminName', $post->author);
        $stmt->bindValue(':imageName', $post->image);
        $stmt->bindValue(':postDescription', $post->postDes);
        $stmt->execute();
    }

    public function getCategory()
    {
        $sql = "SELECT title FROM category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getFullPost($PostId)
    {
        $sql = "SELECT * FROM posts WHERE id = ? ORDER BY id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $PostId);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function getCommentContents($PostId)
    {
        $sql = "SELECT * FROM comments WHERE post_id = ? AND status='ON'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $PostId);
        $stmt->execute();
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function createComment($comment)
    {
        $sql = 'INSERT INTO comments (dateTime, name, email, comments, approved_by, post_id, status)';
        $sql .= 'VALUES(:datetime, :name, :email, :comments, :approveBy, :postId, :status)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':datetime', $comment->datetime);
        $stmt->bindValue(':name', $comment->name);
        $stmt->bindValue(':email', $comment->email);
        $stmt->bindValue(':comments', $comment->comments);
        $stmt->bindValue(':approveBy', $comment->approved_by);
        $stmt->bindValue(':postId', $comment->post_id);
        $stmt->bindValue(':status', $comment->status);
        $stmt->execute();
    }

    public function createCategory($category)
    {
        $sql = 'INSERT INTO category (title, author, datetime)';
        $sql .= 'VALUES(:categoryName, :adminName, :datetime)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':categoryName', $category->title);
        $stmt->bindValue(':adminName', $category->author);
        $stmt->bindValue(':datetime', $category->datetime);
        $stmt->execute();
    }

    public function getCategoryList()
    {
        $sql = "SELECT * FROM category ORDER BY id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return ($stmt->fetchall(PDO::FETCH_ASSOC));
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category where id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function getAdminLists()
    {
        $sql = "SELECT * FROM admin ORDER BY id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return ($stmt->fetchall(PDO::FETCH_ASSOC));
    }

    public function createAdmin($admin)
    {
        $sql = 'INSERT INTO admin (datetime, username, password, adminname, addedby, aheadline, abio, aimage)';
            $sql .= 'VALUES(:datetime, :username, :password, :adminname, :addedby, "headline", "bio", "image")';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':datetime', $admin->datetime);
            $stmt->bindValue(':username', $admin->username);
            $stmt->bindValue(':password', $admin->password);
            $stmt->bindValue(':adminname', $admin->adminname);
            $stmt->bindValue(':addedby', $admin->addedby);
            $stmt->execute();
    }

    public function deleteAdmin($aid) {
        $sql = "DELETE FROM admin WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $aid);
        return $stmt->execute();
    }

    public function getUnapprovedComments() 
    {
        $sql = "SELECT * FROM comments WHERE status ='OFF' ORDER BY id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return ($stmt->fetchall(PDO::FETCH_ASSOC));
    }

    public function getApprovedComments() 
    {
        $sql = "SELECT * FROM comments WHERE status ='ON' ORDER BY id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return ($stmt->fetchall(PDO::FETCH_ASSOC));
    }

    public function approveComment($cid)
    {
        $sql = "UPDATE comments SET status = 'ON', approved_by = 'Author' WHERE id = ? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $cid);
        return $stmt->execute();
    }

    public function unApproveComment($cid)
    {
        $sql = "UPDATE comments SET status = 'OFF', approved_by = 'Author' WHERE id = ? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $cid);
        return $stmt->execute();
    }

    public function deleteComment($cid) {
        $sql = "DELETE FROM comments WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $cid);
        return $stmt->execute();
    }    

    public function get_post_data()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return ($stmt->fetchall(PDO::FETCH_ASSOC));
    }

    public function get_post_details($did) {
        $sql = "SELECT * FROM posts WHERE id = ? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $did);
        $stmt->execute();
        return ($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function delete_post_data($did) 
    {
        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $did);
        return $stmt->execute(); 
    }

    public function get_total_number($table_name)
    {
        $sql = "SELECT COUNT(*) as num FROM " . $table_name;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $TotalRows = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $TotalRows['num'];
    }

    public function get_recent_posts()
    {
        $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return ($stmt->fetchall(PDO::FETCH_ASSOC));
    }
}

?>