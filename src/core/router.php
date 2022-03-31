<?php
 namespace app\core;
class Router {
    private $dev="/contacts/mvc";
    public Request $request;
    public  $routes=[];
    public function __construct(){
        $this->request=new Request();
    }
    public function get($path,$callback){
        $this->routes['GET'][$this->dev.$path]=$callback;
    }
    public function resolve(){
        $path= $this->request->getPath();
        $method = $this->request->getMethod();
        $callback= $this->routes[$method][$path] ?? false;
        var_dump($method);
        var_dump($path);
        if($callback === false){
            echo "404 Not Found";
            exit;
        }
        echo call_user_func($callback);
    }
}
?>