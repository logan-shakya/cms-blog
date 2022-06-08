<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\Router;
use app\controllers\MainController;
use app\controllers\CategoryController;
use app\controllers\AdminController;
use app\controllers\CommentController;
use app\controllers\PostController;
use app\controllers\DashboardController;


$router = new Router();

$router->get('/', [MainController::class, 'index']);
$router->post('/', [MainController::class, 'index']);
$router->get('/posts', [MainController::class, 'index']);

$router->get('/posts/create', [MainController::class, 'createPost']);
$router->post('/posts/create', [MainController::class, 'createPost']);

$router->get('/posts/fullPost', [MainController::class, 'fullPost']);
$router->post('/posts/fullPost', [MainController::class, 'fullPost']);

$router->post('/posts/comment', [MainController::class, 'storeComment']);

$router->get('/posts/category', [CategoryController::class, 'createCategory']);
$router->post('/posts/category', [CategoryController::class, 'createCategory']);
$router->get('/category/delete', [CategoryController::class, 'deleteCategory']);

$router->get('/posts/admin', [AdminController::class, 'createAdmin']);
$router->post('/posts/admin', [AdminController::class, 'createAdmin']);


$router->get('/admin/delete', [AdminController::class, 'deleteAdmin']);

$router->get('/posts/comment', [CommentController::class, 'manageComment']);
$router->post('/posts/comment', [CommentController::class, 'comments']);

$router->get('/comment/approve', [CommentController::class, 'approveComment']);
$router->get('/comment/unapprove', [CommentController::class, 'unApproveComment']);
$router->get('/comment/delete', [CommentController::class, 'deleteComment']);

$router->get('/posts/postData', [PostController::class, 'get_post_data']);
$router->post('/posts/postData', [PostController::class, 'comments']);
$router->get('/posts/deletePostData', [PostController::class, 'get_post_detail']);
$router->get('/deletePostData/delete', [PostController::class, 'delete_post_data']);
$router->get('/posts/editPost', [PostController::class, 'get_post_detail']);

$router->get('/posts/dashboard', [DashboardController::class, 'dashboard']);
$router->post('/posts/dashboard', [DashboardController::class, 'dashboard']);


$router->resolve();

?>