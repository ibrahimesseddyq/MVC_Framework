<?php
 namespace app\core;

class App {
    public static $ROOT_DIR;
    public Router $router;
    public Request $request;
    public function __construct($rootpath){
        self::$ROOT_DIR=$rootpath;
        $this->request= new Request();
        $this->router = new Router($this->request);
    }
    public function run(){
        echo $this->router->resolve();
    }
}