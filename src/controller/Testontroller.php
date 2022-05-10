<?php
namespace App\controller;

class TestController extends Controller{
        function get(){
            $this->router->registerGet("/php",function(){
                return "php";
            });
        }
        function post(){

        }
    }