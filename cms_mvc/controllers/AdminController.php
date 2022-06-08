<?php
namespace app\controllers;
use app\Router;
use app\models\Admin;

class AdminController
{
    public function createAdmin(Router $router)
    {
        $adminLists = $router->db->getAdminLists();
        $adminData = [
            'aid' => '',
            'ausername' => '',
            'aname' => '',
            'apassword' => '',
            'aconfirmpassword' => '',
        ];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminData['ausername'] = $_POST['username'];
            $adminData['aname'] = $_POST['name'];
            $adminData['apassword'] = $_POST['password'];
            $adminData['aconfirmpassword'] = $_POST['confirmpassword'];

            $admin = new Admin();
            $admin->load($adminData);
            $admin->save();
            header('Location: /posts/admin');
            exit;
        }

        $router->renderView('admin/index',[
            'adminLists' => $adminLists,
        ]);
    }

    public function deleteAdmin(Router $router)
    {
        $AdminId = $_GET['id'] ?? null;
        
        if(!$AdminId) {
            header['Location: /posts/admin'];
            exit;
        }
        else {
            $router->db->deleteAdmin($AdminId);
            \header('Location: /posts/admin');
        }
    }
}
?>