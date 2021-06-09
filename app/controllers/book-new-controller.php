<?php
require  "../models/book-model.php";
require "../models/author-model.php";
require "../models/publisher-model.php";
require "../models/genre-model.php";

$errors = [];

$inputs = [];

if(isPosted()){
    // Récupération de la saisie
    $inputs = filter_input_array(INPUT_POST, [
        "titre" => FILTER_SANITIZE_STRING,
        "prix"  => FILTER_SANITIZE_NUMBER_INT,
        "auteur_id" => FILTER_SANITIZE_NUMBER_INT,
        "editeur_id" => FILTER_SANITIZE_NUMBER_INT,
        "genre_id" => FILTER_SANITIZE_NUMBER_INT
    ]);

    // Insertion dans la BD
    $errors = insertBook($inputs);

    // Si insertion OK alors redirection
    if(empty($errors)){
        header("location:/book-list");
        exit;
    }
}


renderView("book-form", [
    "authorList" => getAllAuthors(),
    "publisherList" => getAllPublishers(),
    "genreList" => getAllGenres(),
    "errorList" => $errors
]);