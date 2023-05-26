<?php
class Database {
    private $connection;

    public function connect($host, $database, $username, $password) {
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to the database successfully.";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

        public function insert($table, $columns) {
            $columnNames = implode(',', array_keys($columns));
            $placeholders = implode(',', array_fill(0, count($columns), '?'));

            $query = "INSERT INTO $table ($columnNames) VALUES ($placeholders)";
            $stmt = $this->connection->prepare($query);

            try {
                $stmt->execute(array_values($columns));
                echo "Record inserted successfully.";
            } catch (PDOException $e) {
                echo "Insertion failed: " . $e->getMessage();
            }
        }

    public function select($table) {
        $query = "SELECT * FROM $table";
        $stmt = $this->connection->query($query);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function update($table, $id, $fields) {
        $setFields = array();
        foreach ($fields as $column => $value) {
            $setFields[] = "$column = ?";
        }
        $setFields = implode(', ', $setFields);

        $query = "UPDATE $table SET $setFields WHERE id = ?";
        $stmt = $this->connection->prepare($query);

        try {
            $stmt->execute(array_merge(array_values($fields), [$id]));
            echo "Record updated successfully.";
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }

    public function delete($table, $id) {
        $query = "DELETE FROM $table WHERE id = ?";
        $stmt = $this->connection->prepare($query);

        try {
            $stmt->execute([$id]);
            echo "Record deleted successfully.";
        } catch (PDOException $e) {
            echo "Deletion failed: " . $e->getMessage();
        }
    }
}

$database = new Database();

$database->connect("localhost", "php_lab05", "root", "");

$database->insert("users", ["name" => "Mohammad", "email" => "osama1@gmail.com"]);

$database->insert("users", ["name" => "Osama", "email" => "osama2@gmail.com"]);

$database->insert("users", ["name" => "Elsaid", "email" => "osama3@gmail.com"]);

$results = $database->select("users");
print_r($results);

$database->update("users", 2, ["name" => "Ahmed", "email" => "0xm.osamaa@gmail.com"]);

$database->delete("users", 3);
