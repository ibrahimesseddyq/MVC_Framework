<?php
    require_once __DIR__."./vendor/autoload.php";
    use app\core\App;

    $app=new App();
    $app->router->get("/user",function(){
        return "user";
    });
    print_r($app->router->routes);
    $app->run();
     ?>