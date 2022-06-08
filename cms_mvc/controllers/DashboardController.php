<?php
namespace app\controllers;
use app\Router;

class DashboardController
{
    public function dashboard(Router $router)
    {
        $posts = $router->db->get_total_number('posts');
        $admin = $router->db->get_total_number('admin');
        $category = $router->db->get_total_number('category');
        $comments = $router->db->get_total_number('comments');
        // var_dump(array('posts' => $posts, 'admin' => $admin, 'category' => $category, 'comments' => $comments));

        $get_recent_posts = $router->db->get_recent_posts();
        foreach($get_recent_posts as $get_recent_post)
        {
            $approved_comments[$get_recent_post['id']] =$router->db->getComments($get_recent_post['id'], 'ON');
            $unapproved_comments[$get_recent_post['id']] =$router->db->getComments($get_recent_post['id'], 'OFF');
            // var_dump ($approved_comments);
        }

        $router->renderView('dashboard/index', [
            'total' => array('posts' => $posts, 'admin' => $admin, 'category' => $category, 'comments' => $comments),
            'get_recent_posts' => $get_recent_posts,
            'approved_comments' => $approved_comments,
            'unapproved_comments' => $unapproved_comments
        ]);
    }
}
?>