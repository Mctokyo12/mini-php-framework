<?php
use Core\View;


if (!function_exists("view")) {
    function view(string $view, array $data=[])  {
        // try {
            echo View::render($view , $data);
        // } catch (\Exception $th) {
        //     echo "La vue [$view] est introuvable: ". $th->getMessage();
        // }
        
    }
}