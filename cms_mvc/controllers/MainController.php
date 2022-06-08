<?php 

namespace app\controllers;
use app\Router;
use app\models\Post;
use app\models\Comment;

class MainController
{
    public function index(Router $router)
    {
        $search = $_GET['Search'] ?? '';
        $posts = $router->db->getAllPosts($search);
        foreach($posts as &$post)
        {
            $post['totalApprovedComments'] = $router->db->getComments($post['id'], "ON");
        }
        $router->renderView('posts/index', [
            'posts' => $posts,
            'search' => $search
        ]);
    }

    public function createPost(Router $router)
    {   
        $categoryData = $router->db->getCategory();
        
        //Array to store data
        $postData = [
            'pTitle' => '',
            'pCategory' => '',
            'pImage' => '',
            'pDescription' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postData['pTitle'] = $_POST['PostTitle'];
            $postData['pCategory'] = $_POST['Category'];
            $postData['pImage'] = $_FILES['Image']['name'] ?? null;
            $postData['pDescription'] = $_POST['PostDescription'];

            $extension_name = pathinfo($postData['pImage'], PATHINFO_EXTENSION);
                 
            if($postData['pImage']){
                //move image to target directory
                $FilePath = dirname(rtrim(__DIR__, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'public'. DIRECTORY_SEPARATOR .'Upload'. DIRECTORY_SEPARATOR ;
                $Target =  $FilePath . $postData['pImage'];
                if(!move_uploaded_file($_FILES['Image']['tmp_name'], $Target))
                {
                    exit("Error!<br>");
                }
            }
            $post = new Post();
            $post->load($postData);
            $post->save();
            header('Location: /posts');
            exit;
        }

        $router->renderView('posts/createPost', [
            'postData' => $postData,
            'categoryData' => $categoryData
        ]);
    }

    public function fullPost(Router $router)
    {
        $PostId = $_GET['id'] ?? '';
        $posts = $router->db->getFullPost($PostId);
        $commentContents = $router->db->getCommentContents($PostId);
        foreach($posts as &$post)
        {
            $post['totalApprovedComments'] = $router->db->getComments($post['id'], "ON");
        }
        // var_dump($posts);
        $router->renderView('posts/fullPost', [
            'posts' => $posts,
            'commentContents' => $commentContents
        ]);
    }

    public function storeComment(Router $router)
    {
        $commentData = [
            'PostId' => '',
            'cName' => '',
            'cEmail' => '',
            'cThoughts' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentData['PostId'] = $_POST['PostId'];
            $commentData['cName'] = $_POST['CommenterName'];
            $commentData['cEmail'] = $_POST['CommenterEmail'];
            $commentData['cThoughts'] = $_POST['CommenterThoughts'];
            
            $comment = new Comment();
            $comment->load($commentData);
            $comment->save();
            header('Location: /posts');
        }

    }
}

?>