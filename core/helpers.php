<?php

if (!function_exists("view")) {
    function view(string $view, $data=[])  {
        extract($data);
        $path = __DIR__."/../app/view/".$view .".php";
        if (file_exists($path)) {
           require $path;
        } else {
            throw new Exception("the view $view is not existe");
        }
        
    }
}