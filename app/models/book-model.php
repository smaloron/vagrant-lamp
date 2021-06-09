<?php

function getAllBooks(): array{
    $pdo = getPDO();
    $sql = "SELECT * FROM vue_livres";
    return $pdo->query($sql)->fetchAll();
}

function getBooksBy(string $searchTerm): array {
    $pdo = getPDO();
    $sql = "SELECT * FROM vue_livres
            WHERE titre LIKE :term OR auteur LIKE :term
            OR editeur LIKE :term OR genre LIKE :term";
    $statement = $pdo->prepare($sql);
    $statement->execute(["term" => "%$searchTerm%"]);
    return $statement->fetchAll();
}

function insertBook(array $data): array{
    try {

        $pdo = getPDO();
        $sql = "INSERT INTO livres 
        (titre, prix, auteur_id, editeur_id, genre_id) 
        VALUES 
        (:titre, :prix, :auteur_id, :editeur_id, :genre_id)";

        $statement = $pdo->prepare($sql);

        $statement->execute($data);

        return [];
    } catch(Exception $err){
        return ["Il y a des erreurs, impossible d'insérer"];
    }
}