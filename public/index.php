<?php

use Dotenv\Dotenv;
use Core\View;
define('BASE_PATH', '/mini-php-framework/public');
require_once(__DIR__."/../vendor/autoload.php");

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// View::init();


require_once(__DIR__."/../Routes.php");



// $page = isset($_GET['page']) ? $_GET['page'] : "home";

// switch ($page) {
//     case 'home':
//         $controller->showHome();
//         break;
//     case 'signup':
//         $controller->showInscription();
//         break;
//     case 'inscrire':
//         $controller->handleInscription();
//         break;
//     default:
//         # code...
//         break;
// }


