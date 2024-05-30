<?php
class Crud {
    private $pdo = NULL;

    public function __construct() {
        $this->connectToDatabase();
    }

    private function connectToDatabase() {
        $serverName = getenv("MYSQL_SERVER");
        $dbUsername = getenv("MYSQL_ACHRAF_WEBSHOP_USER");
        $dbPassword = getenv("MYSQL_ACHRAF_WEBSHOP_PASSWORD");
        $dbName = getenv("MYSQL_ACHRAF_WEBSHOP_DATABASE");
        $dbPort = getenv("MYSQL_SERVER_PORT");
        if (empty($this->pdo)) {
            try {
            $dsn = "mysql:host=" . $serverName . "; port=". $dbPort ."; dbname=" . $dbName;
                $this->pdo = new PDO($dsn, $dbUsername, $dbPassword);
                // Set the PDO error mode to exception
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed sql: " . $e->getMessage();
            }
        }
    }   

    private function prepareBindExecute($sql, $params) {
        // Prepare the SQL statement
        $stmt = $this->pdo->prepare($sql);
        // Bind the parameters to the statement
        foreach ($params as $varName => $value) {
            $stmt->bindValue($varName, $value);
        }
        // Execute the statement
        $stmt->execute();
        // Return the object
        return $stmt;
    }

    public function createRow($sql, $params) {
        try {
            $stmt = $this->prepareBindExecute($sql, $params);

            // Return the last inserted ID
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            // Log the error message and return false to indicate failure
            error_log("Insertion failed: " . $e->getMessage());
            return false;
        }
    }

    public function readOneRow($sql, $params) {
        try {
            $stmt = $this->prepareBindExecute($sql, $params);

            // Set the fetch mode to fetch as an object
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // Fetch the single row
            $row = $stmt->fetch();

            // Return the fetched row
            return $row;
        } catch (PDOException $e) {
            // Log the error message and return false to indicate failure
            error_log("Retrieval failed: " . $e->getMessage());
            return false;
        }
    }

    public function readMultipleRows($sql, $params) {
        try {
            $stmt = $this->prepareBindExecute($sql, $params);

            // Set the fetch mode to fetch as objects
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // Fetch all rows
            $rows = $stmt->fetchAll();

            // Return the fetched rows
            return $rows;
            } catch (PDOException $e) {
                // Log the error message and return false to indicate failure
                error_log("Retrieval failed: " . $e->getMessage());
                return false;
            }
    }

    public function updateRow($sql, $params) {
        try {
            $stmt = $this->prepareBindExecute($sql, $params);

            // Return the number of affected rows
            return $stmt->rowCount();
        } catch (PDOException $e) {
            // Log the error message and return false to indicate failure
            error_log("Update failed: " . $e->getMessage());
            return false;
        }
    }

    public function deleteRow($sql, $params) {
        try {
            $stmt = $this->prepareBindExecute($sql, $params);

            // Return the number of affected rows
            return $stmt->rowCount();
        } catch (PDOException $e) {
            // Log the error message and return false to indicate failure
            error_log("Deletion failed: " . $e->getMessage());
            return false;
        }
    }
}
?>