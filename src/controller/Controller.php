<?php
namespace App\controller;
    use App\core\Router;
class Controller{

    public $router;
    function __construct($router){
        $this->router= new $router ?? new Router;

    }
    public function get(){}
    public function post(){}
}