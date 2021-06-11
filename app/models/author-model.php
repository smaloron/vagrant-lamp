<?php

function getAllAuthors(): array
{
    $pdo = getPDO();
    $sql = "SELECT * FROM auteurs";
    return $pdo->query($sql)->fetchAll();
}

function insertAuthor(array $data): array
{
    try {
        $pdo = getPDO();
        $sql = "INSERT INTO auteurs (prenom, nom) VALUES(:prenom, :nom)";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
        return [];
    } catch (Exception $err) {
        //return ["Impossible d'ajouter un auteur"];
        return [$err->getMessage()];
    }
}

function updateAuthor(array $data): array
{
    try {
        $pdo = getPDO();
        $sql = "UPDATE auteurs SET prenom= :prenom, nom= :nom WHERE id= :id";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
        return [];
    } catch (Exception $err) {
        //return ["Impossible d'ajouter un auteur"];
        return [$err->getMessage()];
    }
}


function deleteOneAuthorById(int $id): string
{
    try {
        $pdo = getPDO();
        $sql = "DELETE FROM auteurs WHERE id= ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$id]);
        return "Suppression ok";
    } catch (Exception $err) {
        return $err->getMessage();
    }
}

function getOneAuthorById(int $id): array
{
    $pdo = getPDO();
    $sql = "SELECT * FROM auteurs WHERE id= ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
    return $statement->fetch();
}
