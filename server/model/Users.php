<?php

@include './server/config/Database.php';

$stmt;

function getAllUsers() {
    require_once '../config/Database.php';
    $sql = "SELECT * FROM dbo.Users";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
