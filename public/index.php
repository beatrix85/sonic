<?php
require __DIR__ . '/../vendor/autoload.php';


// chargement des classes Model
// require __DIR__ . '/../app/Model/Character.php';
// require __DIR__ . '/../app/Model/Type.php';
// require __DIR__ . '/../app/Model/Core.php';

// On require nos contrôleurs
require __DIR__ . '/../app/src/Controllers/CoreController.php';
require __DIR__ . '/../app/src/Controllers/MainController.php';

// Chargement de nos classes utilitaires
require __DIR__ . '/../app/src/Utils/DBData.php';

$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);


//mapping des routes

$router->map('GET', '/', 'MainController#home', 'home');
$match = $router->match();

if ($match !== false) {
    // Ca match => On dispatch
    $dispatchInfos = $match['target'];
    // dump($dispatchInfos);
    // $dispatchInfos contient par ex. "MainController#home"
    // on va extraire de la chaine retournée
    // cf : explode : https://www.php.net/manual/en/function.explode.php
    $controllerAndMethod = explode('#', $dispatchInfos);
    // dump($controllerAndMethod);

    // le nom du contrôleur (à l'index 0)
    $controllerName = $controllerAndMethod[0];
    // dump($controllerName);

    // le nom de la méthode (à l'index 1)
    $methodName = $controllerAndMethod[1];
    // dump($methodName);

    // Appelons notre contrôleur et notre méthode dynamiquement
    // $controller = new "MainController"();
    // car $controllerName vaut "MainController"
    // Merci PHP :)
    // ... on en profite pour transmettre le routeur
    // via le constructeur du contrôleur,
    // qui appelle le constructeur parent, celui de CoreController
    // en lui transmettant les mêmes arguments (le routeur)
    $controller = new $controllerName($router);
    // On va appeler la méthode de la même manière
    // idem ici $methodName vaut "home"
    // $controller->"home"();
    $controller->$methodName($match['params']); // Appel dynamique
    // Ici on transmet le tableau de paramètres fourni par AltoRouter $match['params']
    // à la méthode que l'on appelle sur le contrôleur trouvé
    // $controller->category([
    //     'id' => 2
    // ])

}