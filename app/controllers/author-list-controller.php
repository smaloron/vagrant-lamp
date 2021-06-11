<?php
require "../models/author-model.php";

$errors = [];
$inputs = [];

// Récupération de l'id
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// Requête pour récupérér les infos de l'auteur
 if(! empty($id)){
     try {
        $inputs = getOneAuthorById($id);
        var_dump($inputs);
     } catch(Exception $err){
        $errors[] = $err->getMessage();
     } 
 }

/*********************
 * Traitement du formulaire
**********************/
if(isPosted()){
    $inputs = filter_input_array(INPUT_POST, [
        "prenom" => FILTER_SANITIZE_STRING,
        "nom" => FILTER_SANITIZE_STRING
    ]);

    // Si pas d'id on fait une insertion
    if(empty($id)){
        $errors = insertAuthor($inputs);
    } else {
        // S'il y a un id 
        // alors on ajoute cet id au tableau des données 
        // passées à la fonction update
        $inputs["id"] = $id;
        $errors = updateAuthor($inputs);
    }
    

    if(empty($errors)){
        header("location:/author-list");
        exit;
    }
}

$list = getAllAuthors();

renderView("author-list", [
    "authorList" => $list,
    "errors" => $errors,
    "inputs" => $inputs
]);
