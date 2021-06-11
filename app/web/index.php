<?php
session_start();

// Affichage du détail des erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Définition de la configuration de l'application
define("DSN", "mysql:host=localhost;port=3309;dbname=bibliotheque;charset=utf8");
define("DB_USER", "app");
define("DB_PASS", "123");


// Import des bibliothèques
require "../lib/framework.php";
require "../lib/database.php";


$path = filter_input(INPUT_GET, "path", FILTER_SANITIZE_URL) ?? "home";

var_dump($path);

// Table de routage 
// qui fait correspondre un URL et un nom de fichier
$routes = [
    "home"      => "home-controller",
    "contact"   => "contact-controller",
    "book-list" => "book-list-controller",
    "book-search" => "book-search-controller",
    "book-new" => "book-new-controller",
    "author-list" => "author-list-controller",
    "author-delete" => "author-delete-controller",
    "register" => "register-controller"
];

// Exécution du routage
dispatchRoute($path, $routes);
