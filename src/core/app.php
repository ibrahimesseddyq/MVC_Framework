<?php
 namespace app\core;
use app\controller\TestController;
class App {
    public static $ROOT_DIR;
    public Router $router;
    public Request $request;
    public TestController $test;
    public function __construct($rootpath){
        self::$ROOT_DIR=$rootpath;
        $this->request= new Request();
        $this->test = new TestController(null);
        $this->router = new Router($this->request);
        $this->run();
    }
    public function run(){
        $this->test->get();
    }
}