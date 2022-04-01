<?php
 namespace app\core;
class Router {
    private $dev="";
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
        if($callback === false){
            return "404 Not Found";
    
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }
    function renderView($view){
        $layout= $this->layoutContent();
        $view = $this->renderOnlyView($view);
        $contentPos = strpos($layout,"{{change}}") ;
        $str_arr= str_split($layout);
        $first_part= implode(array_slice($str_arr,0,$contentPos-1));
        $second_part= implode(array_slice($str_arr,$contentPos+10,-1));
        $full= $first_part.$view.$second_part;
        echo $full;
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