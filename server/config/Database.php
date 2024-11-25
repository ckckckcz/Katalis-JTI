<?php

class Database {
    function getDBConnection() {
        $servername = "GE08T\MSSQLKATALIS";
        $dbname = "Katalis";
        // $servername = "RIOVALDOALFIYAN\MSQLRIO";
        // $dbname = "KatalisJTI";
    
        try {
            $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $conn;
    }
}
