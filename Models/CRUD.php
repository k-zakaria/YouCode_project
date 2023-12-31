<?php
require "/Core/database.PHP";

class Crud extends DataBase{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function add($table, $data) {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        try {
            $stmt = $this->pdo->prepare($sql);

            if (!$stmt) {
                die("Error in prepared statement: " . $this->pdo->errorInfo()[2]);
            }

            $types = str_repeat('s', count($data));
            $params = array_values($data);

            // Bind parameters
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key + 1, $value, PDO::PARAM_STR); // Assuming all values are strings
            }

            $result = $stmt->execute();

            $stmt->closeCursor(); // Close the cursor to allow for the next query

            return $result;
        } 
        catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
   
    }
    public function selectRecords($table, $columns = "*", $where = null) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT $columns FROM $table";

        if ($where !== null) {
            $sql .= " WHERE $where";
        }

        $stmt = $this->pdo->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " .  $this->pdo->errorInfo()[2]);
        }

        // Execute the prepared statement
        $stmt->execute();

        // Get the result set
        $result = $stmt->execute();

        // Close the statement
        $stmt->closeCursor();

        return $result;
    }
    public function deleteRecord($table, $id) {
      
            // Use a prepared statement to prevent SQL injection
            $sql = "DELETE FROM $table WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);

            // Bind parameters to the prepared statement
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the prepared statement
            $result = $stmt->execute();
            if($result){
                echo "\n<br>delete complete \n";
            }else{
               echo " no succusful delete ";
            }

            // Close the statement
            $stmt->closeCursor();

            return $result;
 
    }
    public function updateRecord($table, $data, $id) {
        // Use prepared statements to prevent SQL injection
        $placeholders = [];
        foreach ($data as $key => $value) {
            $placeholders[] = "$key = :$key";
        }

        $sql = "UPDATE $table SET " . implode(', ', $placeholders) . " WHERE id = :id";
        $data['id'] = $id;

        $stmt = $this->pdo->prepare($sql);

        // Bind parameters to the prepared statement
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Execute the prepared statement
        $result = $stmt->execute();

        return $result;
    }

}
