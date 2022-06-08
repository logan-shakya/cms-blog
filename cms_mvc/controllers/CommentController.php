<?php
namespace app\controllers;
use app\Router;
// use app\models\Category;

class CommentController
{
    public function manageComment(Router $router)
    {
        $unapprovedComments = $router->db->getUnapprovedComments();
        $approvedComments = $router->db->getApprovedComments();
        $router->renderView('managecomments/index', [
            'unapprovedComments' => $unapprovedComments,
            'approvedComments' => $approvedComments
        ]);
    }

    public function approveComment(Router $router)
    {   
        $commentId = $_GET['id'] ?? null;

        if(!$commentId) {
            \header('Location: /posts/comment');
            exit;
        }
        else {
            $router->db->approveComment($commentId);
            header('Location: /posts/comment');
            exit;
        }
    }

    public function unApproveComment(Router $router)
    {
        $commentId = $_GET['id'] ?? null;

        if(!$commentId) {
            \header('Location: /posts/comment');
            exit;
        }
        else {
            $router->db->unApproveComment($commentId);
            header('Location: /posts/comment');
            exit;
        }
    }

    public function deleteComment(Router $router)
    {
        $commentId = $_GET['id'] ?? null;

        if(!$commentId) {
            \header('Location: /posts/comment');
            exit;
        }
        else {
            $router->db->deleteComment($commentId);
            header('Location: /posts/comment');
            exit;
        }
    }
}
?>