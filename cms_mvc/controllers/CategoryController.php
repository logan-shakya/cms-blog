<?php
namespace app\controllers;
use app\Router;
use app\models\Category;

class CategoryController
{
    public function createCategory(Router $router)
    {
        $categoryLists = $router->db->getCategoryList();
        $categoryData = [
            'cTitle' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryData['cTitle'] = $_POST['CategoryTitle'];
            
            $category = new Category();
            $category->load($categoryData);
            $category->save();
            header('Location: /posts/category');
            exit;
        }

        $router->renderView('category/index',[
            'categoryData' => $categoryData,
            'categoryLists' => $categoryLists 
        ]);
    }

    public function deleteCategory(Router $router)
    {   
        $categoryId = $_GET['id'] ?? null;

        if(!$categoryId){
            header('Location: /posts/category');
            exit;
        }
        else {
            $router->db->deleteCategory($categoryId);
            header('Location: /posts/category');
            exit;
        }
        
    }
}
?>