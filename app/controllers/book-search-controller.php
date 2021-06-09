<?php
require "../models/book-model.php";

// Récupération du critère de recherche
$searchTerm = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);

renderView("book-list", [
    "bookList" => getBooksBy($searchTerm)
]);

