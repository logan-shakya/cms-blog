<?php
namespace app;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    public Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get($url,$fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url,$fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {
        $currentUrl = $_SERVER['PATH_INFO']  && $_SERVER['PATH_INFO'] != '/' ? rtrim($_SERVER['PATH_INFO'], '/') :  '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'POST'){
            $fn = $this->postRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        }

        if($fn) {
            call_user_func($fn, $this);
        } else{
            echo "Page not found!!!";
        }
        
        // echo '<pre>';
        // var_dump($fn);
        // echo '</pre>';
    }

    public function renderView($view, $params = [])
    {
        // var_dump($params);
        // $key= 'posts';
        // $$key = $posts;
        foreach ($params as $key => $value) {
            // var_dump($key);
            // var_dump($$key);

            $$key = $value;
            
            // var_dump($$key);
            // var_dump($posts);
            // print_r($$key);
        }
        // var_dump($params);
        ob_start();
        include_once __DIR__."/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__."/views/_layout.php";
    }
}
?>