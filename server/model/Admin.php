<?php

@include './server/config/Database.php';

$stmt;

function getAllAdmin() {
    $sql = "SELECT * FROM dbo.Admin";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function getAdminByNip($nip) {
    $sql = "SELECT * FROM dbo.Admin WHERE nip = :nip";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->bindParam(':nip', $nip);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

