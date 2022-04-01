<?php
    require_once __DIR__."./../vendor/autoload.php";
    use app\core\App;

    $app=new App(dirname(__DIR__));
    // $app->router->get("/user",function(){
    //     return "user";
    // });
    // $app->router->get("/salam","salam");
    // $app->run();
    $app->router->renderView('salam');

     ?>