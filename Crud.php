<?php
class Crud {
    private $pdo;

    public function __construct() {
        $serverName = "";
        $dbUsername = "";
        $dbPassword = "";
        $dbName = "";
        $dbPort = "";

        try {
            $serverName = getenv("MYSQL_SERVER");
            $dbUsername = getenv("MYSQL_ACHRAF_WEBSHOP_USER");
            $dbPassword = getenv("MYSQL_ACHRAF_WEBSHOP_PASSWORD");
            $dbName = getenv("MYSQL_ACHRAF_WEBSHOP_DATABASE");
            $dbPort = getenv("MYSQL_SERVER_PORT");

            $dsn = "mysql:host=" . $serverName . "; port=". $dbPort ."; dbname=" . $dbName;
            $this->pdo = new PDO($dsn, $dbUsername, $dbPassword);
            // Set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
        } catch (PDOException $e) {
            echo "Connection failed sql: " . $e->getMessage();
        }
    }

    public function createRow($sql, $params) {
        try {
            // Prepare the SQL statement
            $stmt = $this->pdo->prepare($sql);

            // Bind the parameters to the statement
            foreach ($params as $varName => $value) {
                $stmt->bindValue($varName, $value);
            }

            // Execute the statement
            $stmt->execute();

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
            // Prepare the SQL statement
            $stmt = $this->pdo->prepare($sql);

            // Bind the parameters to the statement
            foreach ($params as $varName => $value) {
                $stmt->bindValue($varName, $value);
            }

            // Execute the statement
            $stmt->execute();

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
            // Prepare the SQL statement
            $stmt = $this->pdo->prepare($sql);

            // Bind the parameters to the statement
            foreach ($params as $varName => $value) {
                $stmt->bindValue($varName, $value);
            }

            // Execute the statement
            $stmt->execute();

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
            // Prepare the SQL statement
            $stmt = $this->pdo->prepare($sql);

            // Bind the parameters to the statement
            foreach ($params as $varName => $value) {
                $stmt->bindValue($varName, $value);
            }

            // Execute the statement
            $stmt->execute();

            // Return the number of affected rows
            return $stmt->rowCount();
        } catch (PDOException $e) {
            // Log the error message and return false to indicate failure
            error_log("Update failed: " . $e->getMessage());
            return false;
        }
    }

    //we don't use this?
    public function deleteRow($sql, $params) {
        try {
            // Prepare the SQL statement
            $stmt = $this->pdo->prepare($sql);

            // Bind the parameters to the statement
            foreach ($params as $varName => $value) {
                $stmt->bindValue($varName, $value);
            }

            // Execute the statement
            $stmt->execute();

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