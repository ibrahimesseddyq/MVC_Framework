<?php
 namespace app\core;
class Router {
    private $dev="/mvc_framework/public/";
    public Request $request;
    public  $routes=[];
    public function __construct(){
        $this->request=new Request();
        echo $this->request->getPath();
    }
    public function get($path,$callback){
        $this->routes['GET'][$this->dev.$path]=$callback;
        echo " Path 1 :".$this->dev.$path."<br>";
    }
    public function resolve(){
        $path= $this->request->getPath();
        echo " Path 2 :".$path."<br>";
        $method = $this->request->getMethod();
        $callback= $this->routes[$method][$path] ?? false;
        var_dump($callback);
        if($callback === false) return "404 Not Found";
        if(is_string($callback))
            return $this->renderView($callback);
        return call_user_func($callback);
    }
    function renderView($view){
        $layout= $this->layoutContent();
        $view = $this->renderOnlyView($view);
        return str_replace("{{change}}",$view,$layout);
    }
    function layoutContent(){
        ob_start();
        include_once App::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }
    function renderOnlyView($view){
        ob_start();
        include_once App::$ROOT_DIR."/views/".$view.".php";
        return ob_get_clean();

    }
}
?>