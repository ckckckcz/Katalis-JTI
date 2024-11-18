<?php

require_once '../config/Database.php';

class Admin {
    private $conn;
    private $stmt;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    public function getAllAdmin() {
        $sql = "SELECT * FROM dbo.Admin";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAdminByNip($nip) {
        $sql = "SELECT * FROM dbo.Admin WHERE nip = :nip";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(':nip', $nip);
        $this->stmt->execute();
        $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
