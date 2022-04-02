<?php
    require_once __DIR__."./../vendor/autoload.php";
    use app\core\App;

    $app=new App(dirname(__DIR__));
    $view1=$app->router->renderView('user');
    $app->router->get("user",function(){
        global $view1;
        return $view1;
    });
    // $app->router->get("/salam","salam");
    $app->run();
    $app->router->renderView('salam');

     ?>