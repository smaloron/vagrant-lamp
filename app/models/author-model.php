<?php

function getAllAuthors(): array{
    $pdo = getPDO();
    $sql = "SELECT * FROM auteurs";
    return $pdo->query($sql)->fetchAll();
}