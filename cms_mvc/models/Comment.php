<?php 
namespace app\models;
use app\Database;
// require_once '/../controllers/sessions.php';


class Comment
{
    public ?string $name = null;
    public ?string $datetime = null;
    public ?string $email = null;
    public ?string $comments = null;
    public ?string $approved_by = null;
    public ?int $post_id = null;
    public ?string $status = null;

    public function load($data)
    {
        $this->name = $data['cName'];
        $this->datetime = \date("Y-m-d H:i:s");
        $this->email = $data['cEmail'];
        $this->approved_by = 'AUthor';
        $this->post_id = $data['PostId'];
        $this->comments = $data['cThoughts'];
        $this->status = "OFF";
    }
    public function save(){        
        $db = Database::$db;
        $db->createComment($this);
    }
}
?>