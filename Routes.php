<?php

use App\Controllers\UserController;
// use App\Models\MonModel;
use App\Models\UserModel;
use Core\Request;
use Core\Router;

$router = new Router();


$router->get("/",[UserController::class , 'showHome']);
$router->get("/test/" , function (Request $request)  {
    var_dump($request->all());
});
$router->get("/about" , [UserController::class , 'showAbout']);
$router->get("/signup" , [UserController::class , 'showInscription']);
$router->post("/inscrire" , [UserController::class , 'handleInscription']);

$router->dispatch();
