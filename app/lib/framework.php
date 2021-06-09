<?php

/**
 * Routage, fait un raquire d'un fichier contrôleur 
 * en fonction de l'URL de la requête
 * 
 * @param string $path
 * @param array $routes
 * @return void
 */
function dispatchRoute(string $path, array $routes)
{
    // On cherche à obtenir un fichier à afficher
    // Si on ne trouve pas la clef dans la table des routes
    // dans ce cas on affiche une page d'erreur 404
    if (array_key_exists($path, $routes)) {
        $controller = $routes[$path];
    } else {
        $controller = "not-found-controller";
    }

    // Le chemin du fichier à inclure
    $controllerPath = "../controllers/$controller.php";

    // Si le fichier existe on fait l'inclusion
    if (file_exists($controllerPath)) {
        require $controllerPath;
    } else {
        echo "Le fichier n'existe pas";
    }
}

function getView(string $viewName, array $data){
    // Mise en cache de la sortie PHP
    // le résutat ne sera pas immédiatement envoyé 
    // dans une réponse 
    ob_start();
    // Transformation des clefs de $data en variables
    // $data["title"] devient $title
    extract($data);

    require "../views/$viewName.php";

    // récupération de la mémoire tampon dans une variable
    // le tampon est ensuite vidé
    $html = ob_get_clean();
    
    return $html;

}


function renderView(string $viewName, array $data){

    // obtenir le résultat de la vue
    $content = getView($viewName, $data);

    // ajouter le rendu de la vue aux données
    $data["content"] = $content;

    // obtenir le résultat du layout
    $html = getView("layout", $data);

    echo $html;
}


function isPosted(){
    return count($_POST)> 0;
}
