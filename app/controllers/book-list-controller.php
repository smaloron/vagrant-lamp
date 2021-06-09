<?php
// import du modèle
require "../models/book-model.php";

$bookList = getAllBooks();



// Affichage de la vue
renderView("book-list", [
    "bookList" => $bookList 
]);