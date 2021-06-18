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

define("DSN", "mysql:host=localhost; port=3309; dbname=formation_php; charset=utf8");
define("DB_USER", "root");
define("DB_PASS", "123");

// Le chemin dans l'url
$path = filter_input(INPUT_GET, "path", FILTER_SANITIZE_URL) ?? "";

$routes = [
    "" => "Home:index",
    "about" => "Home:about",
    "test/insert" => "Test:insert",
    "test/update" => "Test:update",
    "test/findOne" => "Test:findOne",
    "test/findAll" => "Test:findAll",
    "test/deleteOne" => "Test:deleteOne"
];

// Instanciation du routeur
$router = new Router($routes);

// Résolution du chemin de la route
// ce qui amène à l'instanciation du controller et à l'exécution d'une méthode

$router->run($path);

