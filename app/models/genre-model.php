<?php

function getAllGenres(): array
{
    $pdo = getPDO();
    $sql = "SELECT * FROM genres";
    return $pdo->query($sql)->fetchAll();
}
