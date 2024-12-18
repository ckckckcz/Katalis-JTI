<?php

require_once __DIR__ . '/../config/Database.php';

class Dosen
{
    private $conn;
    private $stmt;
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    function getAllDosen()
    {
        $sql = "SELECT * FROM Dosen";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertDosen($value)
    {
        $sql = "INSERT INTO dosen 
                (nip, nama_lengkap, Jurusan)
                VALUES (?, ?, ?)";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $value['nip']);
        $this->stmt->bindParam(2, $value['nama_lengkap']);
        $this->stmt->bindParam(3, $value['Jurusan']);
        if ($this->stmt->execute()) {
            return true;  // Successfully inserted
        } else {
            return false; // Failed to insert
        }
    }
}
