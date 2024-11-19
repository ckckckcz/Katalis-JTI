<?php

@include './server/config/Database.php';

$stmt;

function getAllBerita() {
    $sql = "SELECT * FROM berita";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

