<?php
use App\Framework\Router;

// Affichage des erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Auto chargement des classes
require "../vendor/autoload.php";

// Constantes de l'application
define("VIEW_PATH", "../src/views/");
define("TWIG_CACHE", "../cache/");

// Le chemin dans l'url
$path = filter_input(INPUT_GET, "path", FILTER_SANITIZE_URL) ?? "";

$routes = [
    "" => "Home:index",
    "about" => "Home:about",
    "test" => "Test:hello"
];

// Instanciation du routeur
$router = new Router($routes);

// Résolution du chemin de la route
// ce qui amène à l'instanciation du controller et à l'exécution d'une méthode

$router->run($path);

