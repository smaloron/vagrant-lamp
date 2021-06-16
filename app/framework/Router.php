<?php
namespace App\Framework;


class Router
{

    /**
     * @var array
     */
    private array $routes;

    /**
     * Router constructor.
     * @param array $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Exécution du routage
     * @param string $path
     */
    public function run(string $path){
        // trouver la route correspondant au chemin
        if(array_key_exists($path, $this->routes)){
            // Transforme la chaine de caractère controller:action
            // en un tableau ordinal
            $routeParts = explode(":", $this->routes[$path]);
            $controllerName = "MyApp\\Controller\\".$routeParts[0]."Controller";
            $methodName = $routeParts[1];
        } else {
            $controllerName = "MyApp\\Controller\\ErrorController";
            $methodName = "notFound";
        }

        // A ce stade on a un variable $controllerName
        // et une variable methodName

        // Instanciation du controler
        $controller = new $controllerName();
        // Exécution de la méthode
        $controller->$methodName();
    }


}