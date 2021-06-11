<?php
require "../models/author-model.php";

// Récupération du paramètre id
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// Suppression de l'auteur
$result = deleteOneAuthorById($id);

// Enregistrement du message de résultat
// dans un message flash (session)
setFlashMessage($result);

// Redirection
header("location:author-list");