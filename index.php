<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'autoload.php';

class Router
{
    private $routes = [];
    private $prefix;

    public function __construct($prefix = '')
    {
        $this->prefix = trim($prefix, '/');
    }

    public function addRoute($uri, $controllerMethod)
    {
        $this->routes[trim($uri, '/')] = $controllerMethod;
    }

    public function route($url)
    {
        // Enlève le préfixe du début de l'URL
        if ($this->prefix && strpos($url, $this->prefix) === 0) {
            $url = substr($url, strlen($this->prefix) + 1);
        }

        // Enlève les barres obliques en trop
        $url = trim($url, '/');

        // Vérification de la correspondance de l'URL à une route définie
        foreach ($this->routes as $route => $controllerMethod) {
            // Vérifie si l'URL correspond à une route avec des paramètres
            $routeParts = explode('/', $route);
            $urlParts = explode('/', $url);

            // Si le nombre de segments correspond
            if (count($routeParts) === count($urlParts)) {
                // Vérification de chaque segment
                $params = [];
                $isMatch = true;
                foreach ($routeParts as $index => $part) {
                    if (preg_match('/^{\w+}$/', $part)) {
                        // Capture les paramètres
                        $params[] = $urlParts[$index];
                    } elseif ($part !== $urlParts[$index]) {
                        $isMatch = false;
                        break;
                    }
                }

                if ($isMatch) {
                    // Extraction du nom du contrôleur et de la méthode
                    list($controllerName, $methodName) = explode('@', $controllerMethod);

                    // Instanciation du contrôleur et appel de la méthode avec les paramètres
                    $controller = new $controllerName();
                    call_user_func_array([$controller, $methodName], $params);
                    return;
                }
            }
        }

        // Si aucune route n'a été trouvée, gérer l'erreur 404
        require_once 'app/views/404.php';
    }
}

// Instanciation du routeur
$router = new Router('DungeonXplorer');

// Ajout des routes
$router->addRoute('', 'HomeController@index'); // Pour la racine
$router->addRoute('home', 'HomeController@index');
$router->addRoute('choixHero', 'ChoixHeroController@index');
$router->addRoute('inscription', 'HomeController@inscription');
$router->addRoute('connexion', 'HomeController@connexion');
$router->addRoute('chapter_view/{id}', 'ChapterController@show');
$router->addRoute('Guerrier', 'CreationGuerrierController@index');
$router->addRoute('Mage', 'CreationMageController@index');
$router->addRoute('Voleur', 'CreationVoleurController@index');
$router->addRoute('creationVoleur', 'CreationVoleurController@creerVoleur');
$router->addRoute('creationGuerrier', 'CreationGuerrierController@creerGuerrier');
$router->addRoute('creationMage', 'CreationMageController@creerMage');
$router->addRoute('admin', 'Admin@index');
$router->addRoute('players', 'PlayerHandlerAdminController@index');

// Appel de la méthode route
$router->route(trim($_SERVER['REQUEST_URI'], '/'));
