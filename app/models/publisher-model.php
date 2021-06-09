<?php

function getAllPublishers(): array
{
    $pdo = getPDO();
    $sql = "SELECT * FROM editeurs";
    return $pdo->query($sql)->fetchAll();
}
