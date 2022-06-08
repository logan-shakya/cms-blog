<?php 
namespace app\models;
use app\Database;
// require_once '/../controllers/sessions.php';


class Post
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $datetime = null;
    public ?string $category = null;
    public ?string $author = null;
    public ?string $image = null;
    public ?string $imagePath = null;
    public ?string $postDes = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['pTitle'];
        $this->datetime = \date("Y-m-d H:i:s");
        $this->category = $data['pCategory'];
        $this->author = 'AUthor';
        $this->image = $data['pImage'] ?? null;
        $this->postDes = $data['pDescription'];
    }
    public function save(){
        if(empty($this->title)) {
            echo 'Title error';
        } elseif ($this->category) {
            echo 'Category Error';
        }
        elseif (strlen($this->postDes)>999) {
            echo 'Description Error';
        }
        
        $db = Database::$db;
        if($this->id){
            // $db->updatePost($this);
        }
        else {
            $db->createPost($this);
            
        }
    }
}
?>