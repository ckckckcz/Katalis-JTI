<?php

require_once __DIR__ . '/../config/Database.php';

class Mahasiswa {
    private $conn;
    private $stmt;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    function getAllMahasiswa() {
        $sql = "SELECT * FROM mahasiswa";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getMahasiswaByNim($nim) {
        $sql = "SELECT * FROM mahasiswa WHERE nim = :nim";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(':nim', $nim);
        $this->stmt->execute();
        $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}