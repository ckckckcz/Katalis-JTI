<?php

class Database {
    public $conn;

    function getDBConnection() {
        $servername = "GE08T\MSSQLKATALIS";
        $dbname = "Katalis";
    
        try {
            $this->conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $this->conn;
    }
}
