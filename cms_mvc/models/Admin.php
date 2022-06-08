<?php

namespace app\models;
use app\Database;

class Admin
{
    public ?int $id = null;
    public ?string $username = null;
    public ?string $password = null;
    public ?string $adminname = null;
    public ?string $addedby = null;
    public ?string $datetime = null;
    // public ?string $aheadline = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->username = $data['ausername'];
        $this->password = $data['apassword'];
        $this->adminname = $data['aname'];
        $this->addedby = 'Author';
        $this->datetime = date("Y-m-d H:i:s");
    }
    
    public function save() {
        $db = Database::$db;
        $db->createAdmin($this);
    }
}


?>