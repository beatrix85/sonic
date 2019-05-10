<?php



// chargement des classes Model
require __DIR__ . '/../app/Model/Character.php';
require __DIR__ . '/../app/Model/Type.php';
require __DIR__ . '/../app/Model/Core.php';

// On require nos contrôleurs
require __DIR__ . '/../app/Controllers/CoreController.php';
require __DIR__ . '/../app/Controllers/MainController.php';

// Chargement de nos classes utilitaires
require __DIR__ . '/../app/Utils/DBData.php';


$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);


//mapping des routes

$router->map('GET', '/', 'MainController#home', 'home');