<?php 

namespace app\controllers;
use app\Router;

class PostController
{
    public function get_post_data(Router $router)
    {

        $all_post_data = $router->db->get_post_data();
        // foreach($all_post_data as &$post_data)
        // {
        //     $post_data['approvedComments'] = $router->db->getComments($post_data['id']);

        //     echo $post_data['approvedComments'];
        // }
        foreach($all_post_data as $post_data){
            $approved_comments[$post_data['id']] =$router->db->getComments($post_data['id'], 'ON');
            $unapproved_comments[$post_data['id']] =$router->db->getComments($post_data['id'], 'OFF');
        }
        
        $router->renderView('post_data/index', [
            'all_post_data' => $all_post_data,
            'approved_comments' => $approved_comments,
            'unapproved_comments' => $unapproved_comments
        ]);
    }

    public function get_post_detail(Router $router)
    {
        $post_id = $_GET['id'];
        // var_dump(end(explode('/',$_SERVER['PATH_INFO'])));
        // exit;
        if(!$post_id) {
            \header('Location: /posts/postData');
            exit;
        }
        else {
            $get_post_detail = $router->db->get_post_details($post_id);
            if($_SERVER['PATH_INFO'] == "/posts/editPost")
            {
                $router->renderView('post_data/editing_page', [
                    'get_post_detail' => $get_post_detail
                ]);                
            }
            else {
                $router->renderView('post_data/delete_post_data', [
                    'get_post_detail' => $get_post_detail
                ]);
            }
        }
    }

    public function delete_post_data(Router $router)
    {
        $deleting_post_id = $_GET['id'];

        if(!$deleting_post_id) {
            \header('Location: /posts/postData');
            exit;
        }
        else {
            $router->db->delete_post_data($deleting_post_id);
            \header('Location: /posts/postData');
            exit;
        }
    }

    public function get_edit_post(Router $router)
    {
        echo $_GET['id'];
        echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';
        // $router->renderView('post_data/editing_page'); delete_post_data
    }
}


?>