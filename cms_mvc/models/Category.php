<?php

namespace app\models;
use app\Database;

class Category
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $author = null;
    public ?string $datetime = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['cTitle'];
        $this->author = 'Author';
        $this->datetime = date("Y-m-d H:i:s");
    }
    
    public function save() {
        $db = Database::$db;
        $db->createCategory($this);
    }
}


?>