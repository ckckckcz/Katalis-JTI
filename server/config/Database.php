<?php

class Database {
    function getDBConnection() {
        // $servername = "GE08T\MSSQLKATALIS";
        // $dbname = "Katalis_New";
        $servername = "RIOVALDOALFIYAN\MSQLRIO";
        $dbname = "katalis_new";
    
        try {
            $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $conn;
    }
}
